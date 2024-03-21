@extends('layouts.admin.app')

@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Settings', 'route' => route('package-feature.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('settings.settings')</h2>
            <form action="{{ route('settings.update') }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <h5 class="text-lg text-gray-700 font-bold">@__('settings.mailing')</h5>
                <hr class="bg-gray-300">
                <div class="row">
                    <div class="form-group text_box col-md-6">
                        <x-input class="block mt-1 w-full" type="text" :label="__('settings.from-address')" :placeholder="__('settings.from-address')"
                            name="MAIL_FROM_ADDRESS" :value="env('MAIL_FROM_ADDRESS')" autofocus />
                    </div>
                    <div class="form-group text_box col-md-6">
                        <x-input class="block mt-1 w-full" type="text" :label="__('settings.from-name')" :placeholder="__('settings.from-name')"
                            name="MAIL_FROM_NAME" :value="env('MAIL_FROM_NAME')" autofocus />
                    </div>
                    <div class="form-group text_box col-md-6">
                        <x-input class="block mt-1 w-full" type="text" :label="__('settings.to-address')" :placeholder="__('settings.to-address')"
                            name="MAIL_TO_ADDRESS" :value="env('MAIL_TO_ADDRESS')" autofocus />
                    </div>
                    <div class="form-group text_box col-md-6">
                        <x-input class="block mt-1 w-full" type="text" :label="__('settings.send-grid-api-key')" :placeholder="__('settings.send-grid-api-key')"
                            name="MAIL_PASSWORD" :value="env('MAIL_PASSWORD')" autofocus />
                    </div>
                </div>

                <h5 class="text-lg text-gray-700 font-bold">@__('settings.payment')</h5>
                <hr class="bg-gray-300">
                <div class="row">
                    <div class="form-group text_box col-md-6">
                        <x-input class="block mt-1 w-full" type="text" :label="__('settings.paytabs-profile-id')" :placeholder="__('settings.paytabs-profile-id')"
                            name="PAYTABS_PROFILE_ID" :value="env('PAYTABS_PROFILE_ID')" autofocus />
                    </div>
                    <div class="form-group text_box col-md-6">
                        <x-input class="block mt-1 w-full" type="text" :label="__('settings.paytabs-server-key')" :placeholder="__('settings.paytabs-server-key')"
                            name="PAYTABS_SERVER_KEY" :value="env('PAYTABS_SERVER_KEY')" autofocus />
                    </div>
                </div>
                <h5 class="text-lg text-gray-700 font-bold">@__('settings.authentication')</h5>
                <hr class="bg-gray-300">

                <h6 class="text-md text-gray-700 font-bold">@__('settings.google')</h6>
                <div class="row">
                    <div class="form-group text_box col-md-6">
                        <x-input class="block mt-1 w-full" type="text" :label="__('settings.google-client-id')" :placeholder="__('settings.google-client-id')"
                            name="GOOGLE_CLIENT_ID" :value="env('GOOGLE_CLIENT_ID')" autofocus />
                    </div>
                    <div class="form-group text_box col-md-6">
                        <x-input class="block mt-1 w-full" type="text" :label="__('settings.google-client-secret')" :placeholder="__('settings.google-client-secret')"
                            name="GOOGLE_CLIENT_SECRET" :value="env('GOOGLE_CLIENT_SECRET')" autofocus />
                    </div>
                </div>
                <h6 class="text-md text-gray-700 font-bold">LinkedIn</h6>
                <div class="row">
                    <div class="form-group text_box col-md-6">
                        <x-input class="block mt-1 w-full" type="text" :label="__('settings.linkedin-client-id')" :placeholder="__('settings.linkedin-client-id')"
                            name="LINKEDIN_CLIENT_ID" :value="env('LINKEDIN_CLIENT_ID')" autofocus />
                    </div>
                    <div class="form-group text_box col-md-6">
                        <x-input class="block mt-1 w-full" type="text" :label="__('settings.linkedin-client-secret')" :placeholder="__('settings.linkedin-client-secret')"
                            name="LINKEDIN_CLIENT_SECRET" :value="env('LINKEDIN_CLIENT_SECRET')" autofocus />
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="button" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2" data-toggle="modal"
                        data-target="#settingsWarning">
                        @__('settings.update')
                    </button>
                    <div class="modal fade" id="settingsWarning" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal body -->
                                <div class="modal-body modal-alert">
                                    <div class="modal-img flex justify-center text-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 20 20">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M8.485 3.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625l6.28-10.875ZM10 6a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 6Zm0 9a1 1 0 1 0 0-2a1 1 0 0 0 0 2Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="modal-text">@__('admin.settings.Changing-internal-settings')</div>
                                    <div>@__('settings.warning')</div>
                                    <div class="modal-text">@__('settings.continue')</div>
                                </div>
                                <div class="modal-footer modal-btns">
                                    <div class="payment-btns text-center">
                                        <button type="submit"
                                            class="btn_hover agency_banner_btn btn-bg">@__('Yes')</button>
                                        <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg3"
                                            data-dismiss="modal">@__('settings.cancel')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('settings.cancel')</a>
                </div>
            </form>

        </x-slot:from>
    </x-feature.edit>
@endsection
