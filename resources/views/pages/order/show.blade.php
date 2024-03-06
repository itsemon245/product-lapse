@extends('layouts.admin.app', ['title' => __('Order Details')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Order Manage'), 'route' => route('admin.order.index')], ['label' => __('Order Details'), 'route' => '']]" />
        </x-slot:breadcrumb>
            <x-slot:details>
        <section class="sign_in_area bg_color sec_pad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 blog_sidebar_left">
                        <div class="blog_single mb_50">
                            <div class="row">
                                <h5 class="f_size_20 f_500 col-md-12">{{ $findOrder->package?->name->{app()->getLocale()} }} <span class="text-success">{{ $findOrder->amount }}</span></h5>
                                <div class="entry_post_info col-md-12">
                                    {{ \Carbon\Carbon::parse($findOrder->date)->format('l, j F Y') }}
                                </div>
                                <div class="col-md-6">
                                    <h6 class="title2">{{ __('Status') }}</h6>
                                    <p class="f_400 mb-30 text-font">{{ ucfirst($findOrder->status) }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="title2">{{ __('Payment Method') }}</h6>
                                    <p class="f_400 mb-30 text-font">{{ $findOrder->payment_method == null ? 'Free Payment' : ucfirst($findOrder->payment_method) }}</p>
                                </div>
                                <div class="col-md-6 {{ $findOrder->transaction_id == null ? 'd-none' : '' }} ">
                                    <h6 class="title2">{{ __('Transaction ID') }}</h6>
                                    <p class="f_400 mb-30 text-font">{{ $findOrder->transaction_id == null ? 'Free Payment' : $findOrder->transaction_id }}</p>
                                </div>
                                <div class="col-md-12">
                                <div class="row">
                                    @if ($findOrder->payment_method == 'bank account')
                                    <div class="col-md-6">
                                        <h6 class="title2">{{ __('Bank Name:') }}</h6>
                                        <p class="f_400 mb-30 text-font">{{ $findOrder->bank_details->name }}</p> 
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="title2">{{ __('Bank Account ID:') }}</h6>
                                        <p class="f_400 mb-30 text-font">{{ $findOrder->bank_details->account_id }}</p> 
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="title2">{{ __('Bank IBAN:') }}</h6>
                                        <p class="f_400 mb-30 text-font">{{ $findOrder->bank_details->iban }}</p> 
                                    </div>
                                    @endif  
                                    <div class="col-md-6">
                                        <h6 class="title2">Street</h6>
                                        <p class="f_400 mb-30 text-font">{{ $findOrder->user->billingAddress()->first()?->street }}</p> 
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="title2">City</h6>
                                        <p class="f_400 mb-30 text-font">{{ $findOrder->user->billingAddress()->first()?->city }}</p> 
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="title2">State</h6>
                                        <p class="f_400 mb-30 text-font">{{ $findOrder->user->billingAddress()->first()?->state }}</p> 
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="title2">Country</h6>
                                        <p class="f_400 mb-30 text-font">{{ $findOrder->user->billingAddress()->first()?->country }}</p> 
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="title2">ZIP</h6>
                                        <p class="f_400 mb-30 text-font">{{ $findOrder->user->billingAddress()->first()?->zip }}</p> 
                                    </div>
                                                           
                                </div> 
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-sidebar box-sidebar">
                            <div class="widget sidebar_widget widget_recent_post mt_60">
                                <div class="media post_author mt_60">
                                    <img class="rounded-circle" src="{{ favicon($findOrder->user->image) }}" alt="">
                                    <div class="media-body">
                                        <h5 class=" t_color3 f_size_18 f_500">{{ $findOrder->user->name }}</h5>
                                        <p class="text-muted">Email: {{ $findOrder->user->email }}</p>
                                        <p class="text-muted">Phone: {{ $findOrder->user->phone }}</p>
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

