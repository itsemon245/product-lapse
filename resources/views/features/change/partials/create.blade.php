@extends('layouts.feature.index', ['title' => 'Change Request'])
@section('main')
    <div id="hx-create-change" class="sign_info">
        <div class="login_info">
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Add Change Request</h2>
            <form method="post" action="{{ route('change.store') }}" class="login-form sign-in-form">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="title" value="Change request title" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text"
                            placeholder="Enter change request title" name="title" :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="Classification" id="classification" placeholder="Choose one"
                            name="classification" required autofocus>
                            <option value="Free">Free</option>
                            <option value="Basic">Basic</option>
                            <option value="Golden">Golden</option>
                            <option value="Dimond">Dimond</option>
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="Priority" id="priority" placeholder="Choose one" name="priority" required
                            autofocus>
                            <option value="Free">Free</option>
                            <option value="Basic">Basic</option>
                            <option value="Golden">Golden</option>
                            <option value="Dimond">Dimond</option>
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="Status" id="status" placeholder="Choose one" name="status" required
                            autofocus>
                            <option value="Free">Free</option>
                            <option value="Basic">Basic</option>
                            <option value="Golden">Golden</option>
                            <option value="Dimond">Dimond</option>
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea label="Details" name="details" placeholder="Write details..." />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="administrator" value="Administrator" />
                        <x-text-input id="administrator" class="block mt-1 w-full" type="text"
                            placeholder="Administrator" name="administrator" :value="old('administrator')" required autofocus />
                        <x-input-error :messages="$errors->get('administrator')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="required_completion_date" value="Required Completion Date" />
                        <x-text-input id="required_completion_date" class="block mt-1 w-full" type="date"
                            placeholder="dd/mm/yyyy (Exp:13/03/2024)" name="required_completion_date" :value="old('required_completion_date')"
                            required autofocus />
                        <x-input-error :messages="$errors->get('required_completion_date')" class="mt-2" />
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Add Change
                        Request</button>
                    <a href="{{ route('change.index') }}" class="btn_hover agency_banner_btn btn-bg btn-bg-grey">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
