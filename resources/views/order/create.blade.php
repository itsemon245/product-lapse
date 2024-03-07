@extends('layouts.frontend.app')

@section('main')
    <x-breadcrumb :list="[['label' => @__('Payments'), 'route' => url()->current()]]">

    </x-breadcrumb>
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info sign_info2">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('Chooce payment type')</h2>
                    <div class="">
                        @foreach ($paymentMethods as $i => $method)
                        {{-- {{ dd($method) }} --}}
                            <form action="{{ route('order.store', ['order' => $order]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="payment_method" value="{{$method}}">
                                <div class="payment-item">
                                    <button class="payment-item-select w-full">
                                        <span>{{ str($method)->title() }}</span>
                                        <img src="/img/payment{{ ++$i }}.png">
                                    </button>
                                </div>
                            </form>
                        @endforeach
                        {{-- <div class="payment-item">
                            <a href="#" class="payment-item-select">
                                <span>Paypal</span>
                                <img src="/img/payment2.png">
                            </a>
                        </div>
                        <div class="payment-item">
                            <a href="#" class="payment-item-select">
                                <span>Google pay</span>
                                <img src="/img/payment3.png">
                            </a>
                        </div>
                        <div class="payment-item">
                            <a href="#" class="payment-item-select">
                                <span>Apple pay</span>
                                <img src="/img/payment4.png">
                            </a>
                        </div>
                        <div class="payment-item">
                            <a href="#" class="payment-item-select">
                                <span>Bank account</span>
                                <img src="/img/payment5.png">
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@pushOnce('customJs')
    <script>
        $('a.nav-link').on('click', function(e) {
            var target = this.hash,
                $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 70
            }, 80, 'swing', function() {
                window.location.hash = target;
            });
        });
        /****/
        $(window).scroll(function() {
            var scrollToTop = $(".top-link");
            if ($(window).scrollTop() >= 200) {
                scrollToTop.fadeIn(200);
            } else {
                scrollToTop.fadeOut(200);
            }
        });
    </script>
    <script></script>
@endPushOnce
