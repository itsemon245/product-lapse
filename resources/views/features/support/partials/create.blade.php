@extends('layouts.subscriber.app', ['title' => @__('Add ticket')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('Add ticket'), 'route' => route('support.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('Add ticket')</h2>
            <form action="{{ route('support.store') }}" method="POST" enctype="multipart/form-data"
                class="login-form sign-in-form">
                <div class="row">
                    @csrf
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="name" value="{{ __('Report name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('Report name') }}" name="name" :value="old('name')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('Classification') }}" id="type" placeholder="Choose one"
                            name="classification" required autofocus>

                            @forelse ($classifications as $classification)
                                <option value="{{ $classification->id }}" @selected($classification->id == old('classification'))>
                                    {{ $classification->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>@__('No classification available')</option>
                            @endforelse

                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('Priority') }}" id="type" placeholder="Choose one" name="priority"
                            required autofocus>

                            @forelse ($priorities as $priority)
                                <option value="{{ $priority->id }}" @selected($priority->id == old('priority'))>
                                    {{ $priority->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>@__('No priority available')</option>
                            @endforelse

                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('Ticket status') }}" id="type" placeholder="Choose one"
                            name="status" required autofocus>

                            @forelse ($statuses as $status)
                                <option value="{{ $status->id }}" @selected($status->id == old('status'))>
                                    {{ $status->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>@__('No status available')</option>
                            @endforelse

                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-textarea required placeholder="{{ __('Ticket description') }}" rows="5" cols="10"
                            name="description" label="{{ __('Ticket description') }}"></x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('Administrator') }}" id="administrator"
                            placeholder="{{ __('Administrator') }}" name="administrator" required autofocus>
                            @if ($users)
                                @forelse ($users as $user)
                                    <option value="{{ $user->id }}" @selected($user->id == old('administrator') || $user->id == auth()->id())>
                                        {{ $user->name }}
                                    </option>
                                @empty
                                    <option disabled>@__('No user available')</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input label="{{ __('Required completion date') }}" id="completion_date"
                            class="block mt-1 w-full" type="date" :value="old('date')" name="completion_date" required
                            autofocus />
                    </div>
                </div>
                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('Add ticket')</button>
                    <a href="{{ route('support.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('Cancel')</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.create>
@endsection
