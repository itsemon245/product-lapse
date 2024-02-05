@extends('layouts.subscriber.app', ['title' => @__('feature/certificate.add')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/certificate.add'), 'route' => route('certificate.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/certificate.add')</h2>
            <form action="{{ route('certificate.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/certificate.label.name') }}" id="received_id"
                            placeholder="Choose one" name="received_id" autofocus>
                            @if ($teams)
                                @forelse ($teams as $team)
                                    <option value="{{ $team->id }}">
                                        {{ $team->first_name }}
                                    </option>
                                @empty
                                    <option disabled>No member available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="company_name" value="{{ @__('feature/certificate.label.company') }}" />
                        <x-input id="company_name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/certificate.placeholder.company') }}" name="company_name" :value="old('company_name')"  autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="issue_date" value="{{ @__('feature/certificate.label.issue') }}" />
                        <x-input id="issue_date" class="block mt-1 w-full" type="date"
                             name="issue_date" :value="old('issue_date')"  autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach  label="{{ __('feature/certificate.label.signature') }}" name='signature' />
                        <x-input-error :messages="$errors->get('signature')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea  label="{{ __('feature/certificate.label.description') }}" placeholder="{{ __('feature/certificate.placeholder.description') }}" rows="5" cols="10" name="description"
                             />                        
                    </div>

                </div>

                <div class="d-flex align-items-center text-center">
                    <x-button type="submit">
                        @__('feature/certificate.submit')
                    </x-button>
                </form>
                </div>
           
        </x-slot:from>
    </x-feature.create>
@endsection
