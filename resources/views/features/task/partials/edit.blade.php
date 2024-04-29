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
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input-label for="name" value="{{ __('feature/task.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/task.placeholder.name') }}" name="name"
                            value="{{ $task->name ?? old('name') }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/task.label.category') }}" id="category"
                            placeholder="{{ __('feature/task.label.category') }}" name="category" required autofocus>

                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}" @if ($task->category == $category->id || $category->id == old('category')) selected @endif>
                                    {{ $category->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>@__('No category available')</option>
                            @endforelse
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/task.label.status') }}" id="status"
                            placeholder="{{ __('feature/task.label.status') }}" name="status" required autofocus>

                            @forelse ($statuses as $status)
                                <option value="{{ $status->id }}" @if ($task->status == $status->id || $status->id == old('status')) selected @endif>
                                    {{ $status->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>@__('No status available')</option>
                            @endforelse
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-12">
                        <div class="extra extra2 extra3">
                            <div class="media post_author state-select">
                                <div class="checkbox remember">
                                    <label>
                                        @__('feature/task.label.mvp')
                                        <input type="checkbox" name="choose_mvp"
                                            @if ($task->choose_mvp == 1) checked @endif>
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
                        <x-textarea id="details" class="block mt-1 w-full" name="details" required
                            placeholder="{{ __('feature/task.placeholder.details') }}"
                            autofocus>{!! $task->details !!}</x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input-label for="steps" value="{{ __('feature/task.label.steps') }}" />
                        <x-textarea id="steps" class="block mt-1 w-full" name="steps"
                            placeholder="{{ __('feature/task.placeholder.steps') }}" required
                            autofocus>{!! $task->steps !!}</x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input label="{{ __('feature/task.label.str-date') }}" id="starting_date"
                            class="block mt-1 w-full" type="date" name="starting_date"
                            value="{{ \Carbon\Carbon::parse($task->starting_date)->format('Y-m-d') }}" required
                            autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input label="{{ __('feature/task.label.end-date') }}" id="ending_date" class="block mt-1 w-full"
                            type="date" name="ending_date"
                            value="{{ \Carbon\Carbon::parse($task->ending_date)->format('Y-m-d') }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-select-input label="{{ __('feature/task.label.administrator') }}" id="administrator"
                            placeholder="{{ __('feature/task.placeholder.administrator') }}" name="administrator" required
                            autofocus>
                            @if ($users)
                                @forelse ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $task->administrator == $user->id ? 'Selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @empty
                                    <option disabled>@__('No category available')</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach label="{{ __('feature/task.label.attach') }}" class="block mt-1 w-full"
                            name="add_attachments[]" />
                    </div>
                    @if ($task->files)
                        <div class="col-md-12">
                            <h6 class="title2">@__('feature/task.attach')</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@__('feature/task.name')</th>
                                            <th>@__('Actions')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($task->files as $file)
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $file->name }}</td>
                                                <td>
                                                    <div class="flex items-center gap-2">
                                                        <a class="btn_hover agency_banner_btn btn-bg btn-table"
                                                            href="{{ route('task.file.download', ['task' => $task, 'file' => $file]) }}">@__('feature/task.view')</a>
                                                        </a>
                                                        <button
                                                        hx-post="{{ route('task.file.delete', ['task' => $task, 'file' => $file]) }}"
                                                        hx-swap="delete"
                                                        hx-vals='{"_method": "DELETE", "_token": "{{csrf_token()}}"}'
                                                        hx-target="closest tr"
                                                        type="button"
                                                        class="btn_hover agency_banner_btn btn-table !bg-red-600 hover:!bg-red-400">@__('Delete')</button>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-gray-500">@__('No attatchments here')</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
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
