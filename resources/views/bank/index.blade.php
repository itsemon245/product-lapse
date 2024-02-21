@extends('layouts.subscriber.app', ['title' => @__('feature/change.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/change.title'), 'route' => route('change.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>
            {{--  --}}
        </x-slot:search>

        <x-slot:actions>
            {{--  --}}
        </x-slot:actions>

        <x-slot:filter>
            {{--  --}}
        </x-slot:filter>

        <x-slot:list>
            <div class="container">
                <div class="sign_info">
                    <div class="login_info">
                        <h2 class=" f_600 f_size_24 t_color3 mb_40">Bank account</h2>
                        <form action="#" class="login-form sign-in-form">
                            <div class="row">
                                <div class="form-group text_box col-lg-4 col-md-12">
                                    <label class=" text_c f_500">Bank account ID</label>
                                    <input type="text" placeholder="996587432156">
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-12">
                                    <label class=" text_c f_500">Name</label>
                                    <input type="text" placeholder="name">
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-12">
                                    <label class=" text_c f_500">IBAN</label>
                                    <input type="text" placeholder="5644984">
                                </div>
                                <div class="form-group text_box col-lg-12 col-md-12">
                                    <div class="extra extra2 extra3">
                                        <div class="media post_author post_author2">
                                            <div class="checkbox remember">
                                                <label>
                                                    <input type="checkbox">
                                                </label>
                                            </div>
                                            <div class="media-body">
                                                <h5 class=" t_color3 f_size_18 f_500">Payment receipt</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="payment-btns text-center">
                                <button type="submit" class="btn_hover agency_banner_btn btn-bg">Continue </button>
                                <button type="submit" class="btn_hover agency_banner_btn btn-bg btn-bg3"> Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </x-slot:list>
        {{-- <x-slot:pagination>
            {!! $changes->links() !!}
        </x-slot:pagination> --}}

    </x-feature.index>
@endsection
