@extends('layouts.subscriber.app', ['title' => @__('feature/task.edit')])

@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/task.edit'), 'route' => route('task.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/task.edit')</h2>
            <form action="{{ route('task.update', $task) }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input-label for="name" value="{{ __('feature/task.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/task.placeholder.name') }}" name="name"
                            value="{{ $task->name }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/task.label.category') }}" id="category"
                            placeholder="{{ __('feature/task.label.category') }}" name="category" required autofocus>

                            @forelse ($categories as $category)
                                <option value="{{ $category->value->{app()->getLocale()} }}"
                                    @if ($task->category == $category->value->{app()->getLocale()}) selected @endif>
                                    {{ $category->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>No category available</option>
                            @endforelse
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/task.label.status') }}" id="status"
                            placeholder="{{ __('feature/task.label.status') }}" name="status" required autofocus>

                            @forelse ($statuses as $status)
                                <option value="{{ $status->value->{app()->getLocale()} }}"
                                    @if ($task->status == $status->value->{app()->getLocale()}) selected @endif>
                                    {{ $status->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>No status available</option>
                            @endforelse
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-12">
                        <div class="extra extra2 extra3">
                            <div class="media post_author state-select">
                                <div class="checkbox remember">
                                    <label>
                                        @__('feature/task.label.mvp')
                                        <input type="checkbox" name="choose_mvp">
                                    </label>
                                    @error('choose_mvp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input-label for="details" value="{{ __('feature/task.label.details') }}" />
                        <x-textarea id="details" class="block mt-1 w-full" name="details"
                            placeholder="{{ __('feature/task.placeholder.details') }}" required
                            autofocus>{!! $task->details !!}</x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input-label for="steps" value="{{ __('feature/task.label.steps') }}" />
                        <x-textarea id="steps" class="block mt-1 w-full" name="steps"
                            placeholder="{{ __('feature/task.placeholder.steps') }}" required
                            autofocus>{!! $task->steps !!}</x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input id="starting_date" value="{{ $task->starting_date }}" class="block mt-1 w-full"
                            type="date" placeholder="{{ __('feature/task.placeholder.str-date') }}" name="starting_date"
                            required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input id="ending_date" value="{{ $task->ending_date }}" class="block mt-1 w-full" type="date"
                            placeholder="{{ __('feature/task.placeholder.end-date') }}" name="ending_date" required
                            autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="administrator" value="{{ __('feature/task.label.administrator') }}" />
                        <x-input id="administrator" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/task.placeholder.administrator') }}" name="administrator"
                            value="{{ $task->administrator }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">{{ __('feature/task.label.attach') }}</label>
                        <input type="file" class="input-file" name="add_attachments">
                        @error('add_attachments')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/task.edit')</button>
                    <a href="{{ route('task.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/task.cancel')</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.create>
@endsection
