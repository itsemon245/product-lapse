@extends('layouts.subscriber.app', ['title' => @__('Select Menus')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('Select Menus'), 'route' => route('select.index')],['label' => @__('Create'), 'route' => route('product.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('Add Select Item')</h2>
            <form action="{{ route('select.store') }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                <div class="login_info">
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-select-input id="selectFeature" label="{{ __('Feature Name') }}" placeholder="{{ __('Feature Name') }}"
                                name="model_type" required autofocus>
                                @foreach ($features as $feature)
                                    <option value="{{ $feature->value }}" @selected($feature->value == old('model_type'))>
                                        @lang($feature->value)</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6" id="hx-target-type">
                            <x-select-input label="{{ __('Type Of Item') }}" id="type" placeholder="{{ __('Type Of Item') }}" name="type"
                                required autofocus>
                                @foreach ($types as $type)
                                    <option value="{{ $type->value }}" @selected($type->value == old('type'))>
                                    @lang($type->value)</option>
                                @endforeach
                            </x-select-input>
                        </div>

                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input-label for="name_en" value="{{ __('Name (English)') }}" />
                            <x-input id="name_en" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('Name (English)') }}" name="name_en" :value="old('name_en')" required autofocus />
                        </div>

                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input-label for="name_ar" value="{{ __('Name (Arabic)') }}" />
                            <x-input id="name_ar" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('Name (Arabic)') }}" name="name_ar" :value="old('name_ar')" required autofocus />
                        </div>

                        <div class="form-group text_box col-lg-12 col-md-6">
                            <x-select-input label="{{ __('Select Text Color') }}" id="color" placeholder="{{ __('Select Text Color') }}"
                                name="text_color" required autofocus>
                                @foreach ($colors as $color)
                                    <option class="text-capitalize" style="color: {{ $color->value }}"
                                        value="{{ $color->value }}" @selected($color->value == old('text_color'))>
                                        @lang($color->name)</option>
                                @endforeach
                            </x-select-input>
                        </div>


                    </div>
                </div>

                <div class="d-flex align-items-center text-center gap-2">
                    <x-button>@__('Submit')</x-button>
                    <x-button type="link" :href="route('select.index')" color="secondary">@__('Cancel')</x-button>
                </div>
            </form>

        </x-slot:from>
    </x-feature.create>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let target = $('#hx-target-type')
            console.log('changed')
            $('#selectFeature').on('change', (e) => {
                let feature = e.target.value
                $.ajax({
                    type: "get",
                    url: "{{ route('select.create') }}" + '?model_type=' + feature,
                    success: function(response) {
                        let data = $(response).find('#hx-target-type')
                        console.log(data)
                        target.html(data.html());
                        // target.niceSelect()
                        $('#hx-target-type .selectpickers').niceSelect()
                    }
                });
            })
        });
    </script>
@endpush
