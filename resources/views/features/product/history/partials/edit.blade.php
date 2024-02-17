@extends('layouts.subscriber.app', ['title' => @__('feature/productHistory.edit')])
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/css/fileinput.min.css">
@endpush
@section('main')
    <x-feature.edit>

        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/productHistory.edit'), 'route' => route('product-history.edit', $productHistory)]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/productHistory.edit')</h2>
            <form action="{{ route('product-history.update', $productHistory) }}" method="POST"
                class="login-form sign-in-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <label class=" text_c f_500">@__('feature/productHistory.date')</label>
                        <input type="date" placeholder="date" name="date" required
                            value="{{ $productHistory->date }}">
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <label class=" text_c f_500">Description</label>
                        <textarea name="description" id="message" cols="30" rows="10" placeholder="Description" required>{{ $productHistory->description }}</textarea>
                    </div>
                    <div class="form-group text_box col-lg-12">
                        <label class=" text_c f_500">@__('feature/productHistory.images')</label>
                        <div class="verify-sub-box">
                            <div class="file-loading">
                                <input id="multiplefileupload" name="image[]" type="file" accept=".jpg,.gif,.png"
                                    multiple />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/productHistory.edit')</button>
                    <a href="{{ route('product-history.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/productHistory.cancel')</a>
                </div>
            </form>
        </x-slot:from>

    </x-feature.edit>


    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/plugins/sortable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/themes/fas/theme.min.js"></script>
        <script>
            // ----------multiplefile-upload---------
            $("#multiplefileupload").fileinput({
                'theme': 'fa',
                'uploadUrl': '#',
                showRemove: false,
                showUpload: false,
                showZoom: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                browseLabel: "",
                browseIcon: "<i class='ti ti-plus'></i>",
                overwriteInitial: false,
                initialPreviewAsData: true,
                fileActionSettings: {
                    showUpload: false,
                    showZoom: false,
                    removeIcon: "<i class='ti ti-close'></i>",
                }
            });
        </script>
    @endpush
@endsection
