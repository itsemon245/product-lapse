@extends('layouts.feature.index', ['title' => @__('feature/change.title')])
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
                        <x-input-label for="title" value="{{ __('feature/change.label.title') }}" />
                        <x-input id="title" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/change.placeholder.title') }}" name="title"
                            value="{{ $change->title }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/change.label.classification') }}" id="classification"
                            placeholder="Choose one" name="classification" required autofocus>
                            @if ($classification)
                                @forelse ($classification as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No classification available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/change.label.priority') }}" id="priority"
                            placeholder="Choose one" name="priority" required autofocus>
                            @if ($priority)
                                @forelse ($priority as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No priority available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/change.label.status') }}" id="status"
                            placeholder="Choose one" name="status" required autofocus>
                            @if ($status)
                                @forelse ($status as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No status available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea label="{{ __('feature/change.label.details') }}" name="details"
                            placeholder="{{ __('feature/change.placeholder.details') }}" value="{{ $change->details }}" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="administrator" value="{{ __('feature/change.label.administrator') }}" />
                        <x-input id="administrator" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/change.placeholder.administrator') }}" name="administrator"
                            value="{{ $change->administrator }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="required_completion_date" value="{{ __('feature/change.label.date') }}" />
                        <x-input id="required_completion_date" class="block mt-1 w-full" type="date"
                            name="required_completion_date"
                            value="{{ \Carbon\Carbon::parse($change->required_completion_date)->format('Y-m-d') }}"
                            required autofocus />
                        <x-input-error :messages="$errors->get('required_completion_date')" class="mt-2" />

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
