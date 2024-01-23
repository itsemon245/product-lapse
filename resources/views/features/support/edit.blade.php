@extends('layouts.feature.index', ['title' => @__('feature/support.edit')])
@section('main')
    <x-feature-edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/support.edit'), 'route' => route('support.edit', $support)]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/support.edit')</h2>
            <form action="{{ route('support.update', ['support' => base64_encode($support->id)]) }}" method="POST"
                enctype="multipart/form-data" class="login-form sign-in-form">
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">@__('feature/support.label.name')</label>
                        <input type="text" name="name" placeholder="@__('feature/support.placeholder.name')" value="{{ $support->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">@__('feature/support.label.classification')</label>

                        <select class="selectpickers" name="classification">
                            @if ($classification)
                                @forelse ($classification as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No classification available</option>
                                @endforelse
                            @endif
                        </select>
                        @error('classification')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">@__('feature/support.label.priority')</label>

                        <select class="selectpickers" name="priority">
                            @if ($priority)
                                @forelse ($priority as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No priority available</option>
                                @endforelse
                            @endif
                        </select>
                        @error('priority')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">@__('feature/support.label.ticket')</label>
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
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <label class=" text_c f_500">@__('feature/support.label.description')</label>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="@__('feature/support.placeholder.description')">{{ $support->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">@__('feature/support.label.administrator')</label>
                        <input type="text" name="administrator" placeholder="@__('feature/support.placeholder.administrator')"
                            value="{{ $support->administrator }}">
                        @error('administrator')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <label class=" text_c f_500">@__('feature/support.label.date')</label>
                        <input type="date" name="completion_date"
                            value="{{ $support->completion_date ? \Carbon\Carbon::parse($support->completion_date)->format('Y-m-d') : '' }}">
                        @error('completion_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

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
    </x-feature-edit>
@endsection
