@extends('layouts.subscriber.app', ['title' => @__('feature/change.title')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/change.title'), 'route' => route('change.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/change.add')</h2>
            <form method="post" action="{{ route('change.store') }}" class="login-form sign-in-form">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="title" value="{{ __('feature/change.label.title') }}" />
                        <x-input id="title" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/change.label.title') }}" name="title" :value="$idea->name ?? old('title')" required
                            autofocus />
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
                                <option value="{{ $priority->value->{app()->getLocale()} }}" @selected($idea?->priority == $priority->value->en || $idea?->priority == $priority->value->ar)>
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
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea label="{{ __('feature/change.label.details') }}" name="details"
                            placeholder="{{ __('feature/change.placeholder.details') }}" required
                            autfocus>{!! $idea->details ?? '' !!}</x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="administrator" value="{{ __('feature/change.label.administrator') }}" />
                        <x-input id="administrator" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/change.placeholder.administrator') }}" name="administrator"
                            :value="old('administrator')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="required_completion_date" value="{{ __('feature/change.label.date') }}" />
                        <x-input id="required_completion_date" class="block mt-1 w-full" type="date"
                            placeholder="dd/mm/yyyy (Exp:13/03/2024)" name="required_completion_date" :value="old('required_completion_date')"
                            required autofocus />
                        <x-input-error :messages="$errors->get('required_completion_date')" class="mt-2" />
                    </div>
                </div>
                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">{{ __('feature/change.submit') }}</button>
                    <a href="{{ route('change.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">{{ __('feature/change.cancel') }}</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.create>
@endsection
