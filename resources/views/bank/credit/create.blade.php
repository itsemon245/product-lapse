@extends('layouts.subscriber.app', ['title' => 'Bank Transfer'])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Bank Transfer', 'route' => route('change.index')]]" />
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
                        <form action="{{ route('credit.card.store') }}" method="POST" class="login-form sign-in-form">
                            @csrf
                            <div class="row">
                                <div class="form-group text_box col-lg-6 col-md-12">
                                    <x-input-label for="number" value="Credit card number" />
                                    <x-input id="number" class="block mt-1 w-full" type="text"
                                        placeholder="ex: 8547 3621 5984" name="number" value="{{ $data->number ?? old('number') }}" required
                                        autofocus />
                                </div>
                                <div class="form-group text_box col-lg-6 col-md-12">
                                    <x-input-label for="name" value="Name" />
                                    <x-input id="name" class="block mt-1 w-full" type="text"
                                        placeholder="name" name="name" value="{{ $data->name ?? old('name') }}" required
                                        autofocus />
                                </div>
                                <div class="form-group text_box col-lg-6 col-md-12">
                                    <x-input-label for="date" value="Expiry date" />
                                    <x-input id="date" class="block mt-1 w-full" type="date"
                                        name="expiry_date" value="{{ $data->expiry_data ?? old('expiry_date') }}" required
                                        autofocus />
                                </div>
                                <div class="form-group text_box col-lg-6 col-md-12">
                                    <x-input-label for="cvv" value="CVV" />
                                    <x-input id="cvv" class="block mt-1 w-full" type="text"
                                        name="cvv" placeholder="---" value="{{ $data->cvv ?? old('cvv') }}" required
                                        autofocus />
                                </div>
                            </div>

                            <div class="payment-btns text-center">
                                <x-button type="submit" class="btn_hover agency_banner_btn btn-bg">Continue </x-button>
                                <x-button type="link" href="{{ route('product.index') }}" class="btn_hover agency_banner_btn btn-bg btn-bg3"> Cancel</x-button>
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
