@extends('layouts.subscriber.app', ['title' => @__('feature/support.add')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/support.add'), 'route' => route('support.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/support.add')</h2>
            <form action="{{ route('support.store') }}" method="POST" enctype="multipart/form-data"
                class="login-form sign-in-form">
                <div class="row">
                    @csrf
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="name" value="{{ __('feature/support.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/support.placeholder.name') }}" name="name" :value="old('name')"
                            required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">

                        <x-select-input label="{{ __('feature/support.label.classification') }}" id="type"
                            placeholder="Choose one" name="classification" required autofocus>

                            @forelse ($classifications as $classification)
                                <option value="{{ $classification->value->{app()->getLocale()} }}">
                                    {{ $classification->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>No classification available</option>
                            @endforelse

                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/support.label.priority') }}" id="type"
                            placeholder="Choose one" name="priority" required autofocus>

                            @forelse ($priorities as $priority)
                                <option value="{{ $priority->value->{app()->getLocale()} }}">
                                    {{ $priority->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>No priority available</option>
                            @endforelse

                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/support.label.ticket') }}" id="type"
                            placeholder="Choose one" name="status" required autofocus>

                            @forelse ($statuses as $status)
                                <option value="{{ $status->value->{app()->getLocale()} }}">
                                    {{ $status->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>No status available</option>
                            @endforelse

                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-textarea placeholder="{{ __('feature/support.placeholder.description') }}" rows="5"
                            cols="10" name="description" label="{{ __('feature/support.label.description') }}">
                        </x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">@__('feature/support.label.administrator')</label>
                        <input type="text" name="administrator"
                            placeholder="{{ __('feature/support.placeholder.administrator') }}">
                        @error('administrator')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">


                        <x-input-label for="date" value="{{ __('feature/support.label.date') }}" />
                        <x-input id="date" class="block mt-1 w-full" type="date" name="completion_date"
                            :value="old('completion_date')" required autofocus />
                    </div>
                </div>
                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/support.submit')</button>
                    <a href="{{ route('support.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/support.cancel')</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.create>
@endsection
