@extends('layouts.subscriber.app', ['title' => 'Create FAQ'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'FAQs ', 'route' => route('faqs.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Add FAQ</h2>
            <form action="{{ route('faqs.store') }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                <div class="login_info">
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Question (English)" id="question_en" type="text"
                                placeholder="Enter Question In English" name="question_en" :value="old('question_en')" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Question (Arabic)" id="question_ar" type="text"
                                placeholder="Enter Question In Arabic" name="question_ar" :value="old('question_ar')" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Answer (English)" id="answer_en" type="text"
                                placeholder="Enter Answer In English" name="answer_en" :value="old('answer_en')" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Answer (Arabic)" id="answer_ar" type="text"
                                placeholder="Enter Answer In Arabic" name="answer_ar" :value="old('answer_ar')" required
                                autofocus />
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center text-center gap-2">
                    <x-button>Submit</x-button>
                    <x-button type="link" :href="route('faqs.index')" color="secondary">Cancel</x-button>
                </div>
            </form>

        </x-slot:from>
    </x-feature.create>
@endsection
