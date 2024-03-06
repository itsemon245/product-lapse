<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{

    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('contact-messages', compact('messages'));
    }

    public function view(ContactMessage $contactMessage)
    {
        return view('contact-message-view', compact('contactMessage'));
    }

    public function reply(Request $request, ContactMessage $contactMessage)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $contactMessage->update([
            'reply' => [
                'body' => $request->reply,
            ],
        ]);

        Mail::to($contactMessage->email)->send(new ContactMessageMail($contactMessage));

        notify()->success(__('Your reply has been sent!'));
        return redirect()->route('contact.messages.view', $contactMessage);
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email:rfc,dns',
            'body' => 'required|string',
        ]);

        $contactMessage = ContactMessage::create([
            ...$request->except('_token', '_method'),
        ]);

        Mail::to(config('mail.global_to.address'))->send(new ContactMessageMail($contactMessage));

        return response()->json([
            'success'=> true,
            'message' => __('Your message has been sent!')
        ]);
    }

    public function destroy(string $id)
    {
        $find = ContactMessage::find($id);
        $find->delete();
        notify()->success(__('Deleted Success!'));
        return back();
    }
}
