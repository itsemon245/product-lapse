@extends('layouts.admin.app', ['title' => 'Deshboard'])
@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="mb-3">
                <h5 class="mb-2">User Manage</h5>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="item lon new card">
                            <div class="list_item p-4">
                                <div class="d-flex gap-2">
                                    <img style="width: 4rem;" class="rounded-circle border" src="{{ favicon() }}"
                                        alt="">
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4 class="mt-2">Subscribers</h4>
                                                <h3 class="text-center">{{ count($subscribers) ?? '0' }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="item lon new card">
                            <div class="list_item p-4">
                                <div class="d-flex gap-2">
                                    <img style="width: 4rem;" class="rounded-circle border" src="{{ favicon() }}"
                                        alt="">
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4 class="mt-2">Verified Subscriber </h4>
                                                <h3 class="text-center">{{ count($verifySubscriber) ?? '0' }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="item lon new card">
                            <div class="list_item p-4">
                                <div class="d-flex gap-2">
                                    <img style="width: 4rem;" class="rounded-circle border" src="{{ favicon() }}"
                                        alt="">
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4 class="mt-2">Not Verify Subscriber</h4>
                                                <h3 class="text-center">
                                                   {{ count($notVerifySubScriber) ?? '0' }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <h5 class="mb-2">Order Manage</h5>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="item lon new card">
                            <div class="list_item p-4">
                                <div class="d-flex gap-2">
                                    <img style="width: 4rem;" class="rounded-circle border" src="{{ favicon() }}"
                                        alt="">
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4 class="mt-2">Total Orders</h4>
                                                <h3 class="text-center">{{ count($orders) ?? '0' }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="item lon new card">
                            <div class="list_item p-4">
                                <div class="d-flex gap-2">
                                    <img style="width: 4rem;" class="rounded-circle border" src="{{ favicon() }}"
                                        alt="">
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4 class="mt-2">Order Summary</h4>
                                                <div class="d-flex text-muted">
                                                    <p>Completed: <span>{{ count($completedOrder) }}</span></p> 
                                                    <p>Pending: <span>{{ count($pendingOrder) }}</span> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="item lon new card">
                            <div class="list_item p-4">
                                <div class="d-flex gap-2">
                                    <img style="width: 4rem;" class="rounded-circle border" src="{{ favicon() }}"
                                        alt="">
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4 class="mt-2">Failed order</h4>
                                                <h3 class="text-center">{{ count($failedOrder) ?? '0' }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <h5 class="mb-2">User Manage</h5>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="item lon new card">
                            <div class="list_item p-4">
                                <div class="d-flex gap-2">
                                    <img style="width: 4rem;" class="rounded-circle border" src="{{ favicon() }}"
                                        alt="">
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4 class="mt-2">Subscriber</h4>
                                                <div class="d-flex text-muted">
                                                    <p>Hello wordl</p> |
                                                    <p>Hello wordl</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="item lon new card">
                            <div class="list_item p-4">
                                <div class="d-flex gap-2">
                                    <img style="width: 4rem;" class="rounded-circle border" src="{{ favicon() }}"
                                        alt="">
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4 class="mt-2">Subscriber</h4>
                                                <div class="d-flex text-muted">
                                                    <p>Hello wordl</p> |
                                                    <p>Hello wordl</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="item lon new card">
                            <div class="list_item p-4">
                                <div class="d-flex gap-2">
                                    <img style="width: 4rem;" class="rounded-circle border" src="{{ favicon() }}"
                                        alt="">
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4 class="mt-2">Subscriber</h4>
                                                <div class="d-flex text-muted">
                                                    <p>Hello wordl</p> |
                                                    <p>Hello wordl</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
