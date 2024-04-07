@extends('layouts.admin.app', ['title' => __('Order Manage')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Order Manage'), 'route' => route('users.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            {{-- <form method="GET" hx-get="{{ route('users.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="model" value="user">
                <input type="search" name="search" class="form-control widget_input" placeholder="{{ __('Search order') }}"
                    hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form> --}}
        </x-slot:search>


        <x-slot:actions>
            {{--  --}}
        </x-slot:actions>

        <x-slot:filter>
            <form method="get" action="{{ route('admin.order.index') }}">
                <select onchange="this.form.submit()" name="search" class="selectpickers selectpickers2">
                    <option value="">@__('All')</option>
                    @forelse ($options as $opt)
                        @if ($opt->value != 'draft')
                            <option value="{{ $opt->value }}" @selected(request()->query('search') == $opt->value)>
                                {{ __($opt->name) }}
                            </option>
                        @endif
                    @empty
                        <option>@__('filter.no-items')</option>
                    @endforelse
                </select>

            </form>
        </x-slot:filter>


        <x-slot:list>
            @forelse ($orders as $order)
                @php
                    $user = App\Models\User::with('image')
                        ->where('id', $order->user->id)
                        ->first();
                @endphp
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item ">
                            <figure class="align-middle"><a href="{{ route('admin.order.show', $order) }}"><img
                                        src="{{ $user->image->url ?? favicon() }}" alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell !w-full">
                                        <h4><a href="{{ route('admin.order.show', $order) }}"
                                                class="f_500 t_color3">{{ $order->package->name->{app()->getLocale()} . ' ' . __('Order by') . ' ' . $user->name }}</a>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li> {{ __('Status:') }} <span class="p_color4">{{ $order->status }}</span>
                                            </li>
                                            <li> {{ __('Amount:') }} <span class="p_color4">{{ $order->amount }}</span>
                                            </li>
                                            @if ($order->plan)
                                                <li>
                                                    {{ __('Expiration date') }} <span
                                                        class="p_color4">{{ \Carbon\Carbon::parse($order->plan->expired_at)->format('l, j F Y') }}</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell !w-full">
                                        <div class="jobsearch-job-userlist !float-start">
                                            <form action="{{ route('admin.order.approve', $order) }}" method="post"
                                                class="like-btn">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="{{ $order->status == 'pending' ? '' : 'd-none' }}"
                                                    {{ $order->status == 'pending' ? '' : 'disabled' }}>
                                                    <i class="ti-check"></i>

                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <a href="#" title="edit" data-toggle="modal" data-target="#myModal1"
                                                data-id="{{ $order->plan->id }}"><i class="ti-pencil"></i></a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <x-feature.not-found />
            @endforelse
        </x-slot:list>
    </x-feature.index>
    {{-- <div class="modal fade" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">@__('Update plan')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="update_plan_form" action="{{ route('admin.order.plan.update', ['id' => '__DUMMY_ID__']) }}"
                    method="POST">
                    @csrf
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group text_box col-lg-6 col-md-6">
                                    <x-select-input label="{{ __('Select Package') }}" id="package" name="package"
                                        required autofocus>
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}" data-validity="{{ $package->validity }}"
                                                data-unit="{{ $package->unit }}">
                                                {{ $package->name->{app()->getLocale()} }}
                                            </option>
                                        @endforeach
                                    </x-select-input>
                                </div>
                                <div class="form-group text_box col-lg-6 col-md-6">
                                    @php
                                        use Carbon\Carbon;
                                        $nextDay = Carbon::now()->addDay()->format('Y-m-d');
                                    @endphp

                                    <label for="expiration_date">@__('Expiration Date'):</label>
                                    <input type="date" id="expiration_date" name="expiration_date"
                                        min="{{ $nextDay }}">

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit"
                            class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">{{ __('Update') }}</button>
                        <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg-grey"
                            data-dismiss="modal">@__('Cancel')</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#package').change(function() {
                var selectedOption = $(this).find('option:selected');
                var validity = parseInt(selectedOption.data('validity'));
                var unit = selectedOption.data('unit');

                if (!isNaN(validity)) {
                    var expirationDate = new Date();
                    if (unit === 'year') {
                        expirationDate.setFullYear(expirationDate.getFullYear() + validity);
                    } else if (unit === 'month') {
                        expirationDate.setMonth(expirationDate.getMonth() + validity);
                    }
                    var formattedExpirationDate = expirationDate.toISOString().split('T')[0];
                    $('#expiration_date').val(formattedExpirationDate);
                }
            });


            $('#myModal1').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var formAction = "{{ route('admin.order.plan.update', ['id' => '__DUMMY_ID__']) }}";
                formAction = formAction.replace('__DUMMY_ID__', id);
                $('#update_plan_form').attr('action', formAction);
            });
        });
    </script>
@endpush
