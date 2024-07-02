@extends('layouts.subscriber.app', ['title' => $team ? @__('feature/team.update') : @__('feature/team.add')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[
                ['label' => @__('feature/team.title'), 'route' => route('team.index')],
                ['label' => $team ? @__('feature/team.update') : @__('feature/team.add'), 'route' => route('team.create')],
            ]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">{{ $team ? __('feature/team.update') : __('feature/team.add') }}</h2>
            <form action="{{ $team ? route('team.update', $team) : route('team.store') }}" method="POST"
                class="login-form sign-in-form">
                @csrf
                @if ($team)
                    @method('PUT')
                @endif
                <div class="row">
                    @if ($team == null)
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="first_name" value="{{ __('feature/team.label.fname') }}"
                                class=" text_c f_500" />
                            <x-input type="text" id="first_name" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('feature/team.placeholder.fname') }}" name="first_name" :value="old('first_name')"
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="last_name" value="{{ __('feature/team.label.lname') }}"
                                class=" text_c f_500" />
                            <x-input type="text" id="last_name" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('feature/team.placeholder.fname') }}" name="last_name" :value="old('last_name')"
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="phone" value="{{ __('feature/team.label.phone') }}"
                                class=" text_c f_500" />
                            <x-input type="text" id="phone" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('feature/team.placeholder.phone') }}" name="phone" :value="old('phone')"
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="email" value="{{ __('feature/team.label.email') }}"
                                class=" text_c f_500" />
                            <x-input type="text" id="email" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('feature/team.placeholder.email') }}" name="email" :value="old('email')"
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="job_title" value="{{ __('Job Title') }}" class=" text_c f_500" />
                            <x-input type="text" id="job_title" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('Job Title') }}" name="job_title" :value="old('job_title')" autofocus />
                            {{-- <x-select-input :label="__('feature/team.label.task')" class="selectpickers" id="task" name="tasks[]"
                                placeholder="Choose one" autofocus>
                                @if ($tasks)
                                    @forelse ($tasks as $task)
                                        <option value="{{ $task->id }}" class="capitalize">{{ $task->name }}
                                        </option>
                                    @empty
                                        <option disabled>
                                            @lang('No items available')
                                        </option>
                                    @endforelse
                                @endif
                            </x-select-input> --}}
                        </div>
                    @endif
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-select-input :label="__('Role')" id="role" placeholder="Choose one" name="role" autofocus>
                            @if ($roles)
                                @forelse ($roles as $role)
                                    <option value="{{ $role->name }}" class="capitalize"
                                        @if ($role->name == $team?->getRole()->name) selected @endif>
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
                    {{-- @if ($team)
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-select-input :label="__('feature/team.label.task')" class="selectpickers" id="task" name="tasks[]"
                                placeholder="Choose one" autofocus>
                                @if ($tasks)
                                    @forelse ($tasks as $task)
                                        <option value="{{ $task->id }}" class="capitalize"
                                            @if ($team?->tasks()->find($task->id) != null) selected @endif>{{ $task->name }}</option>
                                    @empty
                                        <option disabled>
                                            @lang('No items available')
                                        </option>
                                    @endforelse
                                @endif
                            </x-select-input>
                        </div>
                    @endif --}}


                    <div class="col-md-12 form-group text_box">
                        <div class="">
                            <label class=" text_c f_500">@__('feature/team.choose')</label>
                        </div>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4">
                                    <div class="extra extra2 extra3">
                                        <div class="media post_author flex items-center">
                                            <div class="checkbox remember">
                                                <label class="">
                                                    <input name="products[]" class="cursor-pointer"
                                                        value="{{ $product->id }}"
                                                        @if ($team?->myProducts()?->find($product->id) != null) checked @endif type="checkbox" />
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
                    <x-button type="submit" class="btn_hover agency_banner_btn btn-bg">
                        @if ($team)
                            @__('feature/team.update')
                        @else
                            @__('feature/team.add')
                        @endif
                    </x-button>

                </div>
            </form>

        </x-slot:from>
    </x-feature.create>
@endsection
