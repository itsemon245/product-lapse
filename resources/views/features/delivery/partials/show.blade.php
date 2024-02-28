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
                        <h5 class="f_size_20 f_500 col-md-12 flex items-center">{{ $delivery->name }}<img class="deliver-img"
                                src="{{ $delivery->is_agreed == !null ? asset('img/done.png') : asset('img/cancel.png') }}"
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
                            <div class="flex items-center gap-4">
                                <input disabled id="pass" type="password" class="border-none w-max"
                                    value="{{ $delivery->password }}">
                                <div class="p-2 pass-toggle">
                                    <span class="ti-eye"></span>
                                </div>
                            </div>
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
                            <img class="rounded-circle" src="{{ favicon($creator->image) }}" alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">{{ $creator->name }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <form action="{{ route('delivery.agree', $delivery) }}" method="post">
                                    @csrf
                                    <button style="{{ $delivery->is_agreed == !null ? 'cursor: not-allowed' : '' }}"
                                        {{ $delivery->is_agreed == !null ? 'disabled' : '' }}
                                        class="button-1 btn-bg-1 {{ $delivery->is_agreed == !null ? 'opacity-50' : '' }} ">@__('feature/delivery.agree')</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('delivery.disagree', $delivery) }}" method="post">
                                    @csrf
                                    <button style="{{ $delivery->is_agreed == null ? 'cursor: not-allowed' : '' }}"
                                        {{ $delivery->is_agreed == null ? 'disabled' : '' }}
                                        class="button-1 btn-bg-2 {{ $delivery->is_agreed == null ? 'opacity-50' : '' }} ">@__('feature/delivery.disagree')</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Attachment part --}}
            @if ($delivery->files)
                <div class="col-md-12">
                    <h6 class="title2">@__('feature/delivery.attachments')</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@__('feature/delivery.title-2')</th>
                                    <th>@__('feature/delivery.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($delivery->files as $file)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $file->name }}</td>
                                        <td><a class="btn_hover agency_banner_btn btn-bg btn-table"
                                                href="{{ route('delivery.file.download', ['delivery' => $delivery, 'file' => $file]) }}">@__('feature/delivery.view')</a>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </x-slot:profile>
        <x-comments :model="$delivery" :comments="$delivery->comments" />
    </x-feature.show>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            let input = $('#pass')
            $('.pass-toggle').click(function() {
                let type = $('#pass').attr('type') == 'password' ? 'text' : 'password';
                input.attr('type', type)
            })
        });
    </script>
@endpush
