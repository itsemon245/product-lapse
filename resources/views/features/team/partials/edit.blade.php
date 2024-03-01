@extends('layouts.subscriber.app', ['title' => @__('feature/report.edit')])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/report.edit'), 'route' => route('report.edit', $report)]]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">{{ __('feature/report.edit') }}</h2>
            <form action="{{ route('report.update', $report) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="name" value="{{ __('feature/report.label.name') }}" />
                        <x-input id="name" value="{{ $report->name }}" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/report.placeholder.name') }}" name="name" :value="old('name')"
                            required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/team.label.position') }}" id="role"
                            placeholder="Choose one" name="role" required autofocus>

                            @forelse ($roles as $role)
                                <option value="{{ $role->value->{app()->getLocale()} }}"
                                    @if ($report->status == $status->value->{app()->getLocale()}) selected @endif>
                                    {{ $role->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>No position available</option>
                            @endforelse

                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="report_date" value="{{ __('feature/report.label.date') }}" />
                        <x-input id="report_date" value="{{ $report->report_date }}" class="block mt-1 w-full"
                            type="text" placeholder="Enter report date" name="report_date" :value="old('report_date')" required
                            autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach label="{{ __('feature/report.label.upload') }}" name='file' />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea placeholder="{{ __('feature/report.placeholder.name') }}" rows="5" cols="10"
                            name="description" label="{{ __('feature/report.placeholder.name') }}">
                            {{ $report->descriptio }}
                        </x-textarea>
                    </div>

                </div>

                <div class="d-flex align-items-center text-center">
                    <x-button type="submit">
                        @__('feature/report.submit')
                    </x-button>
                    <x-button>
                        @__('feature/report.cancel')
                    </x-button>
                </div>
            </form>
        </x-slot:from>
    </x-feature.edit>
@endsection
