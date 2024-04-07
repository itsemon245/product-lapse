@extends('layouts.admin.app', ['title' => __('Users Management')])
@section('main')
    <section class="breadcrumb_area">
        <div class="container">
            <div class="breadcrumb_content text-center">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">@__('Users Management')</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('users.create') }}">@__('Create user')</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <form method="POST" action="{{ route('users.store') }}" class="login-form sign-in-form"
                        enctype="multipart/form-data"> @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-select-input label="Select Package" id="selectPackage" name="package_id">
                                    @foreach ($packages as $package)
                                        <option value="{{ $package?->id }}" @selected(old('package') == $package?->id || $package?->id == $activePackage?->id)>
                                            {{ $package?->name->{app()->getLocale()} }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                            <div class="form-group text_box col-md-6" id="hx-target">
                                <div class="flex items-end">
                                    <div>
                                        <x-input-label class="mb-1" for="validity" value="{{ __('Validity') }}" />
                                        <x-input id="validity" class="block mt-1 w-full" type="text"
                                            placeholder="{{ __('Validity') }}" name="validity" :value="$activePlan?->validity ?? $activePackage?->validity"
                                            autofocus />
                                    </div>
                                    <x-select-input name="unit" class="!mb-[24px] !w-[120px]">
                                        <option value="day" @selected($activePackage?->unit == 'day')>{{ __('Day') }}</option>
                                        <option value="month" @selected($activePackage?->unit == 'month')>{{ __('Month') }}</option>
                                        <option value="year" @selected($activePackage?->unit == 'year')>{{ __('Year') }}</option>
                                    </x-select-input>
                                </div>
                            </div>

                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">@__('singup.label.fname')</label>
                                <input type="text" placeholder="{{ __('singup.placeholder.fname') }}" name="first_name"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">@__('singup.label.lname')</label>
                                <input type="text" placeholder="{{ __('singup.placeholder.lname') }}" name="last_name"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">@__('singup.label.email')</label>
                                <input type="text" placeholder="{{ __('singup.placeholder.email') }}" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">@__('singup.label.password')</label>
                                <input type="password" placeholder="{{ __('singup.placeholder.email') }}" name="password"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">@__('singup.label.phone')</label>
                                <input type="text" placeholder="{{ __('singup.placeholder.phone') }}" name="phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">@__('singup.label.work-place')</label>
                                <input type="text" placeholder="{{ __('singup.placeholder.work-place') }}"
                                    name="workplace" value="{{ old('workplace') }}">
                                @error('workplace')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">@__('singup.label.position')</label>
                                <input type="text" placeholder="{{ __('singup.placeholder.position') }}" name="position">
                                @error('position')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">@__('singup.label.promo-code')</label>
                                <input type="text" placeholder="{{ __('singup.placeholder.promo-code') }}"
                                    name="promotional_code" value="{{ old('promotional_code') }}">
                                @error('promotional_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-center">
                            <button type="submit"
                                class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('Create user')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- The Modal -->
    <div class="modal fade" id="myModal1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">@__('singup.conditions')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-wrap">
                        <h5>Terms &amp; conditions</h5>
                        <ul>
                            <li>It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at it has a more-or-less normal distribution</li>
                            <li>It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at it has a more-or-less normal distribution</li>
                            <li>It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at it has a more-or-less normal distribution</li>
                            <li>It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at it has a more-or-less normal distribution</li>
                        </ul>

                        <h5>Terms &amp; conditions</h5>
                        <ul>
                            <li>It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at it has a more-or-less normal distribution</li>
                            <li>It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at it has a more-or-less normal distribution</li>
                            <li>It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at it has a more-or-less normal distribution</li>
                            <li>It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at it has a more-or-less normal distribution</li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let target = $('#hx-target')
            console.log('changed')
            $('#selectPackage').on('change', (e) => {
                let package = e.target.value
                $.ajax({
                    type: "get",
                    url: "{{ url()->current() }}" + '?package_id=' + package,
                    success: function(response) {
                        let data = $(response).find('#hx-target')
                        console.log(data)
                        target.html(data.html());
                        $('#hx-target .selectpickers').each((i, el) => {
                            $(el).niceSelect()
                        })
                    }
                });
            })
        });
    </script>
@endpush
