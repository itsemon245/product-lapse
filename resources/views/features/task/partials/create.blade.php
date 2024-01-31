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
                        <label class=" text_c f_500">{{ __('feature/task.label.name') }}</label>
                        <input type="text" placeholder="{{ __('feature/task.placeholder.name') }}" name="name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">{{ __('feature/task.label.category') }}</label>
                        <select class="selectpickers" name="category">
                            @if ($category)
                                @forelse ($category as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No category available</option>
                                @endforelse
                            @endif
                        </select>
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">{{ __('feature/task.label.status') }}</label>
                        <select class="selectpickers" name="status">
                            @if ($status)
                                @forelse ($status as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No status available</option>
                                @endforelse
                            @endif
                        </select>

                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
                        <label class=" text_c f_500">{{ __('feature/task.label.details') }}</label>
                        <textarea name="details" id="message" cols="30" rows="10"
                            placeholder="{{ __('feature/task.placeholder.details') }}"></textarea>
                        @error('details')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <label class=" text_c f_500">{{ __('feature/task.label.steps') }}</label>
                        <textarea name="steps" id="message" cols="30" rows="10"
                            placeholder="{{ __('feature/task.placeholder.steps') }}"></textarea>
                        @error('steps')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">{{ __('feature/task.label.str-date') }}</label>
                        <input type="date" placeholder="date" name="starting_date">
                        @error('starting_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">{{ __('feature/task.label.end-date') }}</label>
                        <input type="date" placeholder="date" name="ending_date">
                        @error('ending_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">{{ __('feature/task.label.administrator') }}</label>
                        <input type="text" placeholder="{{ __('feature/task.placeholder.administrator') }}"
                            name="administrator">
                        @error('administrator')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/task.submit')</button>
                    <a href="{{ route('task.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/task.cancel')</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.create>
@endsection
