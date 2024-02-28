@extends('layouts.admin.app', ['title' => 'Contact Messages'])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Contact Messages', 'route' => route('contact.messages')]]" />
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
