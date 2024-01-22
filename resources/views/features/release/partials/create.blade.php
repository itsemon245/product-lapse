@extends('layouts.feature.index', ['title' => 'Report'])
@section('main')
    <div class="sign_info">
        <div class="login_info">
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Add Report</h2>
            <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="name" value="Report name" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="Enter Report name" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="Report type" id="type" placeholder="Choose one" name="type" required
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
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="report_date" value="Report date" />
                        <x-text-input id="report_date" class="block mt-1 w-full" type="text"
                            placeholder="Enter report date" name="report_date" :value="old('report_date')" required autofocus />
                        <x-input-error :messages="$errors->get('report_date')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach name='file' />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea placeholder="Write description" rows="5" cols="10" name="descriptio n"
                            label="Description" />
                    </div>

                </div>
                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">{{ __('feature/document.submit') }}</button>
                    <a href="{{ route('release.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">{{ __('feature/release.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
