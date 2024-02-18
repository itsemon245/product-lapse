@extends('layouts.subscriber.app', ['title' => @__('feature/task.add')])

@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/task.add'), 'route' => route('task.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/task.add')</h2>
            <form action="{{ route('task.store') }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input-label for="name" value="{{ __('feature/task.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/task.placeholder.name') }}" name="name" :value="$task->name ?? old('name')"
                            required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/task.label.category') }}" id="category"
                            placeholder="Select Category" name="category" required autofocus>
                            @if ($categories)
                                @forelse ($categories as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No category available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/task.label.status') }}" id="status"
                            placeholder="Select status" name="status" required autofocus>
                            @if ($statuses)
                                @forelse ($statuses as $status)
                                    <option value="<?= $status->value->{app()->getLocale()} ?>">
                                        <?= $status->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No status available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
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
                            autofocus>{!! $task->details ?? '' !!}</x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input-label for="steps" value="{{ __('feature/task.label.steps') }}" />
                        <x-textarea id="steps" class="block mt-1 w-full" name="steps"
                            placeholder="{{ __('feature/task.placeholder.steps') }}" required
                            autofocus>{!! $idea->steps ?? '' !!}</x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input label="{{ __('feature/task.label.str-date') }}" id="starting_date"
                            class="block mt-1 w-full" type="date" name="starting_date" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input label="{{ __('feature/task.label.end-date') }}" id="ending_date" class="block mt-1 w-full"
                            type="date" name="ending_date" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/task.label.administrator') }}" id="administrator"
                            placeholder="{{ __('feature/task.placeholder.administrator') }}" name="administrator"
                            required autofocus>
                            @if ($users)
                                @forelse ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @empty
                                    <option disabled>No user available</option>
                                @endforelse
                            @endif
                        </x-select-input>

                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input class="input-file" type='file' placeholder="Choose File" :label="__('feature/task.label.attach')"
                            name='add_attachments' />

                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/task.submit')</button>
                    <a href="{{ route('task.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/task.cancel')</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.create>
@endsection
