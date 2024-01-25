@extends('layouts.feature.index', ['title' => @__('feature/task.edit')])
@section('main')

<x-feature.edit>
    <x-slot:breadcrumb>
        <x-breadcrumb :list="[['label' => @__('feature/task.edit'), 'route' => route('report.edit', $report)]]" />
    </x-slot:breadcrumb>
    <x-slot:from>
        <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/task.edit')</h2>
        <form action="{{ route('task.update', ['task' => base64_encode($task->id)]) }}" method="POST"
            class="login-form sign-in-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group text_box col-lg-12 col-md-12">
                    <label class=" text_c f_500">@__('feature/task.label.name')</label>
                    <x-input type="text" placeholder="{{ __('feature/task.placeholder.name') }}" name="name"
                        value="{{ $task->name }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text_box col-lg-6 col-md-6">
                    <label class=" text_c f_500">@__('feature/task.label.category')</label>
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
                    <label class=" text_c f_500">@__('feature/task.label.status')</label>

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
                                    <x-input type="checkbox" name="choose_mvp"
                                        @if ($task->choose_mvp) checked @endif>
                                </label>
                                @error('choose_mvp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="media-body">
                                <h5 class=" t_color3 f_size_16 f_500">@lang('task.choose_mvp')</h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group text_box col-lg-12 col-md-12">
                    <label class=" text_c f_500">@__('feature/task.label.details')</label>
                    <textarea name="details" id="message" cols="30" rows="10" placeholder="{{ __('feature/task.label.details') }}">{{ $task->details }}</textarea>
                    @error('details')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text_box col-lg-12 col-md-12">
                    <label class=" text_c f_500">@__('feature/task.label.steps')</label>
                    <textarea name="steps" id="message" cols="30" rows="10" placeholder="{{ __('feature/task.placeholder.steps') }}">{{ $task->steps }}</textarea>
                    @error('steps')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text_box col-lg-6 col-md-6">
                    <label class=" text_c f_500">@__('feature/task.label.str-date')</label>
                    <x-input type="date" name="starting_date"
                        value="{{ $task->starting_date ? \Carbon\Carbon::parse($task->starting_date)->toDateString() : '' }}">
                    @error('starting_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text_box col-lg-6 col-md-6">
                    <label class=" text_c f_500">@__('feature/task.label.end-date')</label>
                    <x-input type="date" name="ending_date"
                        value="{{ $task->ending_date ? \Carbon\Carbon::parse($task->ending_date)->toDateString() : '' }}">

                    @error('ending_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text_box col-lg-6 col-md-6">
                    <label class=" text_c f_500">@__('feature/task.label.administrator')</label>
                    <x-input type="text" placeholder="{{ __('feature/task.placeholder.administrator') }}" name="administrator"
                        value="{{ $task->administrator }}">
                    @error('administrator')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text_box col-lg-6 col-md-6">
                    <label class=" text_c f_500">{{ __('feature/task.label.attach') }}</label>
                    <x-input type="file" class="input-file" name="add_attachments">
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
</x-feature.edit>
@endsection
