@extends('layouts.feature.index', ['title' => @__('feature/idea.edit')])

@section('main')

    <x-feature.edit>

        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/idea.edit'), 'route' => route('idea.edit', $idea)]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/idea.edit')</h2>
            <form action="{{ route('idea.update', ['idea' => base64_encode($idea->id)]) }}" method="POST"
                class="login-form sign-in-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input-label for="name" value="{{ __('feature/idea.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/idea.placeholder.name') }}" name="name"
                            value="{{ $idea->name }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input-label for="owner" value="{{ __('feature/idea.label.owner') }}" />
                        <x-input id="owner" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/idea.placeholder.owner') }}" name="owner"
                            value="{{ $idea->owner }}" required autofocus />

                    </div>
                    <div class="form-group text_box col-lg-12">
                        <x-select-input label="{{ __('feature/idea.label.priority') }}" id="priority"
                            placeholder="{{ __('feature/idea.label.priority') }}" name="priority" required autofocus>
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
                        <x-input-error :messages="$errors->get('priority')" class="mt-2" />
                    </div>

                    <div class="form-group text_box col-lg-12">
                        <x-input-label for="details" value="{{ __('feature/idea.label.details') }}" />
                        <x-textarea id="details" class="block mt-1 w-full" name="details" value="{{ $idea->details }}"
                            placeholder="{{ __('feature/idea.placeholder.details') }}" cols="30" rows="10"
                            required autofocus />
                    </div>

                    <div class="form-group text_box col-lg-12">
                        <x-input-label for="requirements" value="{{ __('feature/idea.label.requirements') }}" />
                        <x-textarea id="requirements" class="block mt-1 w-full" name="requirements"
                            value="{{ $idea->requirements }}"
                            placeholder="{{ __('feature/idea.placeholder.requirements') }}" cols="30" rows="10"
                            required autofocus />
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/idea.submit')</button>
                    <a href="{{ route('idea.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/idea.cancel')</a>
                </div>
            </form>
        </x-slot:from>

    </x-feature.edit>
@endsection
