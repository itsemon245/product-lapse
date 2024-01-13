@extends('layouts.feature.index', ['title' => 'Report'])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[
                ['label' => 'Edit Report', 'route' => route('report.edit', $report)],
                ]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Edit Report</h2>
        <form action="{{ route('report.update', $report) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group text_box col-lg-6 col-md-6">
                    <x-input-label for="name" value="Report name" />
                    <x-text-input id="name" value="{{ $report->name }}" class="block mt-1 w-full" type="text" placeholder="Enter Report name" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="form-group text_box col-lg-6 col-md-6">
                    <x-select-input label="Report type" id="type"  placeholder="Choose one" name="type" required autofocus> 
                        <option value="Free">Free</option>
                        <option value="Basic">Basic</option>
                        <option value="Golden">Golden</option>
                        <option value="Dimond">Dimond</option>
                    </x-select-input>
                </div>
                <div class="form-group text_box col-lg-6 col-md-6">
                    <x-input-label for="report_date" value="Report date" />
                    <x-text-input id="report_date" value="{{ $report->report_date }}" class="block mt-1 w-full" type="text" placeholder="Enter report date" name="report_date" :value="old('report_date')" required autofocus />
                    <x-input-error :messages="$errors->get('report_date')" class="mt-2" />
                </div>
                <div class="form-group text_box col-lg-6 col-md-6">
                    <x-attach name='file' />
                </div>
                <div class="form-group text_box col-lg-12 col-md-6">
                    <x-textarea placeholder="Write description" rows="5" cols="10" name="descriptio n" label="Description"> 
                        {{ $report->descriptio }}
                    </x-textarea>
                </div>                       
                
            </div>
            
            <div class="d-flex align-items-center text-center">
                <x-button type="submit" > 
                    Add Report
                </x-button>
                <x-button > 
                    Cancle
                </x-button>
            </div>
        </form>
        </x-slot:from>
    </x-feature.edit>
@endsection
