@extends('layouts.admin.app', ['title' => __('Contact Messages')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Contact Messages'), 'route' => route('contact.messages')]]" />
        </x-slot:breadcrumb>

        <x-slot:list>
            @forelse ($messages as $message)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item ">
                            <figure class="align-middle"><a href="#"><img src="{{ favicon() }}" alt=""></a>
                            </figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('contact.messages.view', $message) }}"
                                                class="f_500 t_color3">{{ $message->name }}</a>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li class="p_color4">{{ $message->email }}</li>
                                            <li class="p_color4"> {{ $message->phone }} </li>
                                            <li class="">
                                                {{ \Carbon\Carbon::parse($message->created_at)->format('l, j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <x-button type="delete" :action="route('admin.contact.message.delete', $message)" :has-icon="true">
                                                    <span class="ti-trash"></span>
                                                </x-button>
                                            </div>
                                        </div>
                                    </div>
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
@endsection
