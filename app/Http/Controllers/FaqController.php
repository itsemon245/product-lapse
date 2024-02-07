<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::get();

        return view('faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $question = [
            'en' => $request->question_en,
            'ar' => $request->question_ar,
        ];
        $answer = [
            'en' => $request->answer_en,
            'ar' => $request->answer_ar,
        ];

        Faq::create([
            'question' => $question,
            'answer' => $answer,
        ]);

        notify()->success(__('notify/success.create'));

        return redirect()->route('faqs.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $question = [
            'en' => $request->question_en,
            'ar' => $request->question_ar,
        ];
        $answer = [
            'en' => $request->answer_en,
            'ar' => $request->answer_ar,
        ];

        $faq->update([
            'question' => $question,
            'answer' => $answer,
        ]);


        notify()->success(__('notify/success.update'));

        return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        notify()->success(__('notify/success.delete'));

        return redirect()->route('faqs.index');
    }
}
