<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email:rfc,dns',
            'body'  => 'required|string',
         ]);

        $contactMessage = ContactMessage::create([
            ...$request->except('_token', '_method'),
         ]);

        Mail::to(config('mail.from.address'))->send(new ContactMessageMail($contactMessage));

        notify()->success(__('Your message has been sent!'));
        return back();
    }
}
