@extends('layouts.subscriber.app', ['title' => @__('feature/report.edit')])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/report.title'), 'route' => route('report.index')],['label' => @__('feature/report.edit'), 'route' => route('report.edit', $report)]]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">{{ __('feature/report.edit') }}</h2>
            <form action="{{ route('report.update', $report) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="name" value="{{ __('feature/report.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/report.placeholder.name') }}" name="name"
                            value="{{ $report->name ?? old('name') }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/report.label.type') }}" id="type" :placeholder="__('feature/report.placeholder.select-type')"
                            name="type" required autofocus>
                            @forelse ($types as $type)
                                <option value="{{ $type->id }}"
                                    @unless ($report->type != $type->id || $type->id == old('type')) selected @endunless>
                                    {{ $type->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>@__('No type available')</option>
                            @endforelse
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input label="{{ __('feature/report.label.date') }}" id="report_date" class="block mt-1 w-full"
                            type="date" name="report_date"
                            value="{{ \Carbon\Carbon::parse($report->report_date)->format('Y-m-d') }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach label="{{ __('feature/report.label.upload') }}" name='file' />
                    </div>
                    @if ($report->file)
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <div class="checkbox remember">
                                <div class="">
                                    <label class=" text_c f_500">@__('feature/report.delete')</label>
                                </div>
                                <label class="">
                                    <input name="delete" class="cursor-pointer" type="checkbox" />
                                </label>
                            </div>
                        </div>
                    @endif
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-textarea placeholder="{{ __('feature/report.placeholder.description') }}" rows="5"
                            cols="10" requrired autofocus name="description"
                            label="{{ __('feature/report.placeholder.description') }}">{{ $report->description ?? old('description') }}</x-textarea>
                    </div>
                </div>
                <div class="d-flex align-items-center text-center">
                    <x-button type="submit">
                        @__('feature/report.edit')
                    </x-button>
                    <a href="{{ route('report.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">{{ __('feature/report.cancel') }}</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.edit>
@endsection
