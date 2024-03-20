@extends('layouts.subscriber.app', ['title' => @__('feature/productHistory.title')])
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/css/fileinput.min.css">
@endpush
@section('main')
    <x-breadcrumb :list="[['label' => @__('feature/productHistory.title'), 'route' => route('product-history.index')]]" />

    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <div class="d-flex justify-content-between align-items-center mb_20">
                        <h2 class=" f_600 f_size_24 t_color3">@__('feature/productHistory.title')</h2>
                        <button type="submit" class="btn_hover agency_banner_btn btn-bg" style="margin: 0"
                            data-toggle="modal" data-target="#myModal"><i class="ti-plus"></i>@__('feature/productHistory.button')</button>
                    </div>
                    <div class="tab-content faq_content" id="myTabContent">
                        <div class="tab-pane fade show active" id="purchas" role="tabpanel" aria-labelledby="purchas-tab">
                            @foreach ($histories as $history)
                                <!-- The Edit Modal -->
                                <div class="modal fade" id="myEditModal{{ $history->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('product-history.update', $history) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h4 class="modal-title">@__('feature/productHistory.modal-title')</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="form-group text_box col-lg-12 col-md-12">
                                                            <x-input label="{{ __('feature/productHistory.date') }}"
                                                                id="required_completion_date" class="block mt-1 w-full"
                                                                type="date" name="date" :value="$history->date" required
                                                                autofocus />
                                                        </div>
                                                        <div class="form-group text_box col-lg-12 col-md-12">
                                                            <x-textarea
                                                                label="{{ __('feature/productHistory.description') }}"
                                                                required name="description"
                                                                placeholder="{{ __('feature/productHistory.description') }}">{{ $history->description ?? old('description') }}</x-textarea>

                                                        </div>
                                                        <div class="form-group text_box col-lg-12 col-md-12">
                                                            <label class=" text_c f_500">@__('feature/productHistory.images')</label>
                                                            <div class="verify-sub-box">
                                                                <div class="file-loading">
                                                                    <x-attach id="fileinput-{{ $history->id }}" data-images="{{$history->images}}"
                                                                        class="old-fileinput" autofocus
                                                                        label="{{ __('feature/productHistory.images') }}"
                                                                        name="image[]" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/productHistory.modal-btn')</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div id="accordion-{{ $history->id }}">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo-{{ $history->id }}" aria-expanded="false"
                                                    aria-controls="collapseTwo-{{ $history->id }}">
                                                    {{ $history->date }}<i class="ti-angle-down"></i><i
                                                        class="ti-angle-up"></i>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo-{{ $history->id }}" class="collapse"
                                            aria-labelledby="headingTwo-{{ $history->id }}"
                                            data-parent="#accordion-{{ $history->id }}">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 history-notes">

                                                        <button type="submit" class="btn_hover agency_banner_btn btn-bg"
                                                            style="margin: 0" data-toggle="modal"
                                                            data-target="#myEditModal{{ $history->id }}"><i
                                                                class="ti-pencil"></i>@__('feature/productHistory.edit')</button>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="title2">@__('feature/productHistory.description')</h6>
                                                        <p class="f_400 mb-30 text-font">
                                                            {{ $history->description }}
                                                        </p>
                                                    </div>
                                                    @foreach ($history->images as $image)
                                                        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                                            <div class="product-history">
                                                                <img src="{{ $image->url }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('product-history.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">@__('feature/productHistory.modal-title')</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <x-input label="{{ __('feature/productHistory.date') }}" id="required_completion_date"
                                    class="block mt-1 w-full" type="date" name="date" :value="old('date')" required
                                    autofocus />
                            </div>
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <x-textarea label="{{ __('feature/productHistory.description') }}" required
                                    name="description"
                                    placeholder="{{ __('feature/productHistory.description') }}">{{ old('description') }}</x-textarea>
                            </div>
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <label class=" text_c f_500">@__('feature/productHistory.images')</label>
                                <div class="verify-sub-box">
                                    <div class="file-loading">
                                        <x-attach id="multiplefileupload" required autofocus
                                            label="{{ __('feature/productHistory.images') }}" name="image[]" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit"
                            class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/productHistory.modal-btn')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/plugins/sortable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/themes/fas/theme.min.js"></script>
        <script>
            // ----------multiplefile-upload---------
            $(document).ready(function() {
                $('#multiplefileupload').fileinput({
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
                $(".old-fileinput").each((i, input) => {
                    let preview = JSON.parse(input.dataset.images).map(image=>{
                        
                        return `<img src='${image.url}' class='file-preview-image w-100' alt='${image.name}' title='${image.name}'>`
                    })
                    let previewConfig = JSON.parse(input.dataset.images).map(image => {

                        return {
                            caption: image.name,
                            width: '120px',
                            url: "{{ route('image.delete') }}",
                            key: image.id,
                        }
                    })
                    $(input).fileinput({
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
                        initialPreview: preview,
                        initialPreviewConfig: previewConfig,
                        fileActionSettings: {
                            showUpload: false,
                            showZoom: false,
                            removeIcon: "<i class='ti ti-close'></i>",
                        }
                    });
                })
            });
        </script>
    @endpush
@endsection
