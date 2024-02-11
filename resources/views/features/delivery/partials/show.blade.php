@extends('layouts.subscriber.app', ['title' => @__('feature/delivery.show')])
@push('styles')
    <style>
        .password-container {
            position: relative;
        }

        .toggle-password {
            cursor: pointer;
        }
    </style>
@endpush
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/delivery.show'), 'route' => route('change.show', base64_encode($delivery->id))]]" />
        </x-slot:breadcrumb>

        <x-slot:details>
            <div class="col-lg-8 blog_sidebar_left">
                <div class="blog_single mb_50">
                    <div class="row">
                        <h5 class="f_size_20 f_500 col-md-12">{{ $delivery->name }}<img class="deliver-img" src="img/done.png"
                                title="Approved"></h5>
                        <div class="col-md-6">
                            <h6 class="title2">@__('feature/delivery.link')</h6>
                            <p class="f_400 mb-30 text-font">{{ $delivery->link }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">@__('feature/delivery.date')</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ \Carbon\Carbon::parse($delivery->created_at)->format('l, j F Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">@__('feature/delivery.user')</h6>
                            <p class="f_400 mb-30 text-font">{{ $delivery->username }}</p>
                        </div>
                        <div class="col-md-6" class="password-container">
                            <h6 class="title2">@__('feature/delivery.password')</h6>
                            <p id="password" class="f_400 mb-30 text-font">
                                ******************
                                <span class="toggle-password" onclick="togglePasswordVisibility()"><button href="#"
                                        class="btn-bg-1 p-1 rounded"><i class="ti-eye"></i>@__('feature/delivery.show-btn')</button></span>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <h6 class="title2">@__('feature/delivery.items')</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ $delivery->items }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </x-slot:details>
        <x-slot:profile>
            <div class="col-lg-4">
                <div class="blog-sidebar box-sidebar">
                    <h6 class="title2" style="padding-top: 20px">@__('feature/delivery.administrator')</h6>
                    <div class="widget sidebar_widget widget_recent_post">
                        <div class="media post_author author-title">
                            <img class="rounded-circle" src="{{ $creator->image->url ?? asset('img/profile1.png') }}"
                                alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">{{ $creator->name }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <a href="#" class="button-1 btn-bg-1">@__('feature/delivery.agree')</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="button-1 btn-bg-2">@__('feature/delivery.disagree')</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Attachment part --}}
            <div class="col-md-12">
                <h6 class="title2">@__('feature/delivery.attachments')</h6>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@__('feature/delivery.title-2')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>the file name</td>
                                <td><button class="btn_hover agency_banner_btn btn-bg btn-table" type="submit">@__('feature/delivery.view')</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </x-slot:profile>
        <x-comments :model="$delivery" :comments="$delivery->comments" />
    </x-feature.show>
@endsection
<script>
    var password = "{{ $delivery->password }}"; // Replace with your actual password

    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var toggleButton = document.querySelector(".toggle-password");

        if (passwordField.tagName === "P") {
            passwordField.innerHTML = password;
            toggleButton.textContent = "Hide";
        } else {
            passwordField.innerHTML = "**********";
            toggleButton.textContent = "Show";
        }
    }
</script>
