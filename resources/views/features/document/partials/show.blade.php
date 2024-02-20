@extends('layouts.subscriber.app', ['title' => @__('feature/document.show')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[
                ['label' => @__('feature/document.show'), 'route' => route('document.show', base64_encode($document->id))],
            ]" />
        </x-slot:breadcrumb>

        <x-slot:details>
            <div class="col-lg-8 blog_sidebar_left">
                <div class="blog_single mb_50">
                    <div class="row">
                        <h5 class="f_size_20 f_500 col-md-12">{{ $document->name }}</h5>
                        <div class="entry_post_info col-md-12">
                            {{ \Carbon\Carbon::parse($document->date)->format('l, j F Y') }}
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h6 class="title2">@__('feature/document.placeholder.version')</h6>
                            <p class="f_400 mb-30 text-font">{{ $document->version }}</p>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <h6 class="title2">@__('feature/document.type')</h6>
                            <p class="f_400 mb-30 text-font">{{ $document->type }}</p>
                        </div>
                        <div class="col-md-12">
                            <h6 class="title2">@__('feature/document.placeholder.description')</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ $document->description }}
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </x-slot:details>
        <x-slot:profile>
            <div class="col-lg-4">
                <div class="blog-sidebar box-sidebar">
                    <div class="widget sidebar_widget widget_recent_post mt_60">
                        <div class="media post_author mt_60">
                            <img class="rounded-circle" src="{{ $user->image->url ?? asset('img/profile1.png') }}"
                                alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">@__('feature/document.classification')</h5>
                            </div>
                        </div>
                        <div class="row">
                            @can('update document')
                                <div class="col-6">
                                    <form method="POST" action="{{ route('document.update.version', $document) }}"
                                        enctype="multipart/form-data" class="login-form">
                                        @csrf
                                        @method('PUT')
                                        <x-modal title="Update Version" label="feature/document.placeholder.version">
                                            <div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="extra extra2 extra3">
                                                            <div class="media post_author state-select">
                                                                <div class="media-body">
                                                                    <h5 class="t_color3 f_size_16 f_500">@__('feature/document.label.version')</h5>
                                                                </div>
                                                                <div class="checkbox remember">
                                                                    <input type="text" name="version" class="form-control"
                                                                        placeholder="{{ __('feature/document.placeholder.version') }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </x-modal>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="button-1 btn-bg-2"><i
                                            class="ti-reload"></i>@__('feature/document.update')</button>
                                    </form>
                                </div>
                            @endcan
                            <div class="col-12">
                                <form action="{{ route('document.download', ['id' => base64_encode($document->id)]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="button-1">
                                        <i class="ti-download"></i>@__('feature/document.download')</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </x-slot:profile>
        <x-comments :model="$document" :comments="$document->comments" />
    </x-feature.show>
@endsection
