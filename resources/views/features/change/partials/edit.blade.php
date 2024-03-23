@extends('layouts.subscriber.app', ['title' => @__('feature/change.title')])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/change.title'), 'route' => route('change.edit', $change)]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">{{ __('feature/change.edit') }}</h2>
            <form action="{{ route('change.update', $change) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input id="title" label="{{ __('feature/change.label.title') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/change.placeholder.title') }}" name="title"
                            value="{{ $change->title ?? old('title') }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/change.label.classification') }}" id="type"
                            placeholder="Choose one" name="classification" required autofocus>

                            @forelse ($classifications as $classification)
                                <option value="{{ $classification->id }}"
                                    @if ($change->classification == $classification->id || $classification->id == old('classification')) selected @endif>
                                    {{ $classification->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>@__('No classification available')</option>
                            @endforelse

                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/change.label.priority') }}" id="type"
                            placeholder="Choose one" name="priority" required autofocus>

                            @forelse ($priorities as $priority)
                                <option value="{{ $priority->id }}"
                                    @if ($change->priority == $priority->id || $priority->id == old('priority')) selected @endif>
                                    {{ $priority->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>@__('No priority available')</option>
                            @endforelse

                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/change.label.status') }}" id="type"
                            placeholder="Choose one" name="status" required autofocus>

                            @forelse ($statuses as $status)
                                <option value="{{ $status->id }}"
                                    @if ($change->status == $status->id || $status->id == old('status')) selected @endif>
                                    {{ $status->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>@__('No status available')</option>
                            @endforelse

                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea label="{{ __('feature/change.label.details') }}" name="details"
                            placeholder="{{ __('feature/change.placeholder.details') }}">{{ $change->details ?? old('details') }}</x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/change.label.administrator') }}" id="administrator"
                            placeholder="{{ __('feature/change.placeholder.administrator') }}" name="administrator"
                            required autofocus>
                            @if ($users)
                                @forelse ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $change->administrator == $user->id ? 'Selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @empty
                                    <option disabled>@__('No user available')</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input label="{{ __('feature/change.label.date') }}" id="required_completion_date"
                            class="block mt-1 w-full" type="date" name="required_completion_date"
                            value="{{ \Carbon\Carbon::parse($change->required_completion_date)->format('Y-m-d') }}"
                            required autofocus />
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <x-button type="submit" class="mr-2">
                        @__('feature/change.edit')
                    </x-button>
                    <a href="{{ route('change.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/change.cancel')</a>
                </div>
            </form>
        </x-slot:from>

    </x-feature.edit>
@endsection
