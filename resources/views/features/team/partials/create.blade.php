@extends('layouts.subscriber.app', ['title' => @__('feature/team.add')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/team.add'), 'route' => route('team.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/team.add-page')</h2>
            <form action="{{ route('team.store') }}" method="POST" class="login-form sign-in-form">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="first_name" value="{{ __('feature/team.label.fname') }}" class=" text_c f_500" />
                        <x-input type="text" id="first_name" class="block mt-1 w-full" type="text"
                    placeholder="{{ __('feature/team.placeholder.fname') }}" name="first_name" :value="old('first_name')"  autofocus />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="last_name" value="{{ __('feature/team.label.lname') }}" class=" text_c f_500" />
                        <x-input type="text" id="last_name" class="block mt-1 w-full" type="text"
                    placeholder="{{ __('feature/team.placeholder.fname') }}" name="last_name" :value="old('last_name')"  autofocus />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="phone" value="{{ __('feature/team.label.phone') }}" class=" text_c f_500" />
                        <x-input type="text" id="phone" class="block mt-1 w-full" type="text"
                    placeholder="{{ __('feature/team.placeholder.phone') }}" name="phone" :value="old('phone')"  autofocus />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="task" value="{{ __('feature/team.label.task') }}" class=" text_c f_500" />
                        <select id="task" name="task"  class="selectpickers">
                            @if($tasks)
                                @forelse ($tasks as $task)
                                <option value="{{ $task->value->{app()->getLocale()} }}">{{ $task->value->{app()->getLocale()} }}</option>
                                @empty
                                <option disabled>
                                    @lang('No items available')
                                </option>
                                @endforelse

                            @endif
                        </select>
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-select-input :label="__('feature/team.label.position')" id="role" placeholder="Choose one" name="role" autofocus>
                            @if ($roles)
                                @forelse ($roles as $role)
                                    <option value="{{ $role->name }}" class="capitalize">
                                        @lang($role->name)
                                    </option>
                                @empty
                                    <option disabled>
                                        @lang('No items available')
                                    </option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="email" value="{{ __('feature/team.label.email') }}" class=" text_c f_500" />
                        <x-input type="text" id="email" class="block mt-1 w-full" type="text"
                    placeholder="{{ __('feature/team.placeholder.email') }}" name="email" :value="old('email')"  autofocus />
                    </div>
                    
                    <div class="col-md-12 form-group text_box">
                        <div class="">  
                            <label class=" text_c f_500">@__('feature/team.choose')</label>
                        </div>
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-md-4">
                                <div class="extra extra2 extra3">
                                    <div class="media post_author">
                                        <div class="checkbox remember">
                                            <label class="mt-4">
                                                <x-input name="products[]" value="{{ $product->id }}" type="checkbox" />
                                            </label>
                                        </div>
                                        <img class="rounded-circle" src="{{ $product->image?->url }}" alt="">
                                        <div class="media-body">
                                            <h5 class=" t_color3 f_size_15 f_500">{{ $product->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @endforeach
                        </div>
                     </div>
                    
                </div>
                
                <div class="d-flex justify-content-between align-items-center text-center">
                    <x-button type="submit" class="btn_hover agency_banner_btn btn-bg">@__('feature/team.submit')
                    </x-button>
                    
                </div>
            </form>

        </x-slot:from>
    </x-feature.create>
@endsection
