@extends('layouts.admin.app', ['title' => 'Order Details'])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Order Details', 'route' => route('admin.order.show', $findOrder)]]" />
        </x-slot:breadcrumb>
            <x-slot:details>
        <section class="sign_in_area bg_color sec_pad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 blog_sidebar_left">
                        <div class="blog_single mb_50">
                            <div class="row">
                                <h5 class="f_size_20 f_500 col-md-12">{{ $findOrder->package->name->{app()->getLocale()} }} <span class="text-success">{{ $findOrder->amount }}</span></h5>
                                <div class="entry_post_info col-md-12">
                                    {{ \Carbon\Carbon::parse($findOrder->date)->format('l, j F Y') }}
                                </div>
                                <div class="col-md-6">
                                    <h6 class="title2">Status</h6>
                                    <p class="f_400 mb-30 text-font">{{ ucfirst($findOrder->status) }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="title2">Payment Method</h6>
                                    <p class="f_400 mb-30 text-font">{{ ucfirst($findOrder->payment_method) }}</p>
                                </div>
                                <div class="col-md-12">
                                    <h6 class="title2">Payment Details</h6>

                                    @if ($findOrder->bank_details == !null)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="f_400 mb-30 text-font">Bank Name:{{ $findOrder->bank_details->name }}</p> 
                                        </div>
                                        <div class="col-md-6">
                                            <p class="f_400 mb-30 text-font">Bank IBAN:{{ $findOrder->bank_details->iban }}</p> 
                                        </div>  
                                    </div>
                                    
                                    @else
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="f_400 mb-30 text-font">Card Name:{{ $findOrder->card_details->name }}</p> 
                                        </div>
                                        <div class="col-md-6">
                                            <p class="f_400 mb-30 text-font">Card Number:{{ $findOrder->card_details->number }}</p> 
                                        </div>  
                                        <div class="col-md-6">
                                            <p class="f_400 mb-30 text-font">Expiry Date:{{ $findOrder->card_details->expiry_date }}</p> 
                                        </div>
                                        <div class="col-md-6">
                                            <p class="f_400 mb-30 text-font">CVV:{{ $findOrder->card_details->cvv }}</p> 
                                        </div> 
                                    </div>
                                    @endif
                                </div>
                               
                               
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-sidebar box-sidebar">
                            <div class="widget sidebar_widget widget_recent_post mt_60">
                                <div class="media post_author mt_60">
                                    <img class="rounded-circle" src="{{ $user->image->url ?? asset('img/profile1.png') }}" alt="">
                                    <div class="media-body">
                                        <h5 class=" t_color3 f_size_18 f_500">{{ $findOrder->user->name }}</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>                   
                </div>
            </div>
        </section>
        </x-slot:details>
        <x-slot:profile>
        {{--  --}}
        </x-slot:profile>
    </x-feature.show>
@endsection

