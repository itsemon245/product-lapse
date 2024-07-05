@extends('layouts.frontend.app', ['footer' => 'off', 'header' => 'off'])

@section('main')
    <div class="min-h-screen flex items-center justify-center">
        <form action="{{ route('app.install.store') }}" method="POST" class="max-w-[400px]">
            @csrf
            <h2 class=" f_600 f_size_24 t_color3">@__('Configure Database')</h2>
            <hr class="bg-gray-300">
            <div class="flex flex-col w-full">
                <x-input class="block mt-1 w-full" type="text" :label="__('App Name')" :placeholder="__('App Name')" name="APP_NAME" value="ProductLapse" />
                <x-input class="block mt-1 w-full" type="text" :label="__('Database Name')" :placeholder="__('Database Name')" name="DB_DATABASE" />
                <x-input class="block mt-1 w-full" type="text" :label="__('Database Username')" :placeholder="__('Database Username')" name="DB_USERNAME" />
                <x-input class="block mt-1 w-full" type="text" :label="__('Database Password')" :placeholder="__('Database Password')" name="DB_PASSWORD" />
            </div>

            <div class="flex">
                <button class="btn_hover agency_banner_btn btn-bg agency_banner_btn2 ">@__('Install')</button>
                <div class="d-flex align-items-center text-center">
                    <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg-grey" data-toggle="modal"
                        data-target="#settingsWarning">
                        @__('Fresh Install')
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
                                    <div class="modal-text">@__('A fresh install will delete everything from your database and replace it with a fresh set of content.')</div>
                                    <div>@__('If you already have data in your database plaese use the "Install" option instead')</div>
                                    <div class="modal-text">@__('settings.continue')</div>
                                </div>
                                <div class="modal-footer modal-btns">
                                    <div class="payment-btns text-center">
                                        <button type="submit" name="fresh" value="true"
                                            class="btn_hover agency_banner_btn btn-bg">@__('Yes')</button>
                                        <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg3"
                                            data-dismiss="modal">@__('settings.cancel')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
