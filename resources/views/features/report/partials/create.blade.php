@extends('layouts.feature.index', ['title' => @__('feature/report.add')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/report.add'), 'route' => route('report.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Add Report</h2>
            <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="name" value="{{ __('feature/report.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="__('feature/report.placeholder.name')" name="name" :value="old('name')"  autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/report.label.type') }}" id="type" placeholder="Choose one" name="type" 
                            autofocus>
                            @if ($type)
                                @forelse ($type as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No type available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
<<<<<<< HEAD
                        <x-input-label for="report_date" value="Report date" />
                        <x-text-input id="report_date" class="block mt-1 w-full" type="text"
                            placeholder="Enter report date" name="report_date" :value="old('report_date')" autofocus />
                        <x-input-error :messages="$errors->get('report_date')" class="mt-2" />
=======
                        <x-input-label for="report_date" value="{{ __('feature/report.label.date') }}" />
                        <x-input id="report_date" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/report.placeholder.date') }}" name="report_date" :value="old('report_date')"  autofocus />
>>>>>>> parvez
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach label="{{ __('feature/report.label.upload') }}" name='file' />
                        <x-input-error :messages="$errors->get('file')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
<<<<<<< HEAD
                        <x-textarea placeholder="Write description" rows="5" cols="10" name="description"
                            label="Description" />
=======
                        <x-textarea placeholder="{{ __('feature/report.label.description') }}" rows="5" cols="10" name="description"
                            label="{{ __('feature/report.placeholder.description') }}" />                        
>>>>>>> parvez
                    </div>

                </div>

                <div class="d-flex align-items-center text-center">
                    <x-button type="submit">
                        @__('feature/report.submit')
                    </x-button>
<<<<<<< HEAD
            </form>
            <x-btn-secondary name="Cancle" />
            </div>

=======
                </form>
                    <x-btn-secondary name="{{ __('feature/report.cancel') }}" />
                </div>
           
>>>>>>> parvez
        </x-slot:from>
    </x-feature.create>
@endsection
