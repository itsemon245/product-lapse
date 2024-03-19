@extends('layouts.subscriber.app', ['title' => 'Select Menus'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Select Menu', 'route' => route('product.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Add Select Item</h2>
            <form action="{{ route('select.store') }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                <div class="login_info">
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-select-input id="selectFeature" label="Feature Name" placeholder="Choose Feature Name"
                                name="model_type" required autofocus>
                                @foreach ($features as $feature)
                                    <option value="{{ $feature->value }}" @selected($feature->value == old('model_type'))>
                                        {{ str($feature->value)->headline() }}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6" id="hx-target-type">
                            <x-select-input label="Type Of Item" id="type" placeholder="Choose Type" name="type"
                                required autofocus>
                                @foreach ($types as $type)
                                    <option value="{{ $type->value }}" @selected($type->value == old('type'))>
                                        {{ str($type->value)->headline() }}</option>
                                @endforeach
                            </x-select-input>
                        </div>

                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input-label for="name_en" value="Name (English)" />
                            <x-input id="name_en" class="block mt-1 w-full" type="text"
                                placeholder="Enter category name" name="name_en" :value="old('name_en')" required autofocus />
                        </div>

                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input-label for="name_ar" value="Name (Arabic)" />
                            <x-input id="name_ar" class="block mt-1 w-full" type="text"
                                placeholder="Enter category name" name="name_ar" :value="old('name_ar')" required autofocus />
                        </div>

                        <div class="form-group text_box col-lg-12 col-md-6">
                            <x-select-input label="Select Text Color" id="color" placeholder="Choose Color"
                                name="text_color" required autofocus>
                                @foreach ($colors as $color)
                                    <option class="text-capitalize" style="color: {{ $color->value }}"
                                        value="{{ $color->value }}" @selected($color->value == old('text_color'))>
                                        {{ str($color->name)->title() }}</option>
                                @endforeach
                            </x-select-input>
                        </div>


                    </div>
                </div>

                <div class="d-flex align-items-center text-center gap-2">
                    <x-button>Submit</x-button>
                    <x-button type="link" :href="route('select.index')" color="secondary">Cancel</x-button>
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
