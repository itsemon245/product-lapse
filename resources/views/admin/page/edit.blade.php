@extends('layouts.admin.app')

@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => $page->title->{app()->getLocale()}, 'route' => route('package-feature.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">{{ $page->title->en }}</h2>
            <form action="{{ route('page.update', $page) }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="form-group text_box col-md-6">
                        <x-input id="name" class="block mt-1 w-full" type="text" label="Title (English)"
                            placeholder="Title (English)" name="title[en]" :value="$page->title->en ?? old('title[en]')"
                            required autofocus />
                    </div>

                    <div class="form-group text_box col-md-6">
                        <x-input id="owner" class="block mt-1 w-full" label="Title (Arabic)" type="text"
                            placeholder="Title (Arabic)" name="title[ar]" :value="$page->title->ar ?? old('title[ar]')"
                            required autofocus />
                    </div>

                    <div class="form-group text_box col-lg-12">
                        <x-input-label for="requirements" value="Body (English)" />
                        <x-textarea id="requirements" class="block mt-1 w-full" name="body[en]" :value="old('body[en]')"
                             placeholder="Body (English)" required autofocus row="5">{!! $page->body->en !!}</x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-12">
                        <x-input-label for="requirements" value="Body (Arabic)" />
                        <x-textarea id="requirements" class="block mt-1 w-full" name="body[ar]" :value="old('body[ar]')"
                            placeholder="Body (Arabic)" required autofocus row="5">{!! $page->body->ar !!}</x-textarea>
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/idea.update')</button>
                    <a href="{{ route('admin') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/idea.cancel')</a>
                </div>
            </form>
           
        </x-slot:from>
    </x-feature.edit>
@endsection
