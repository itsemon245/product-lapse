@extends('layouts.subscriber.app', ['title'=> @__('feature/certificate.title')])
@section('main')
<x-feature.index>
    <x-slot:breadcrumb>
        <x-breadcrumb :list="[
            ['label' => @__('feature/certificate.title'), 'route' => route('certificate.index')],
            ]" />
    </x-slot:breadcrumb>

    <x-slot:search>
  {{--  --}}
    </x-slot:search>


    <x-slot:actions>
  {{--  --}}
    </x-slot:actions>

    <x-slot:filter>
    {{-- Empty --}}
    </x-slot:filter>

    <x-slot:list>
        <div class="container">
            <div class="sign_info">
                <div class="login_info form-layout">
                    <div class="certificate-1" style="display: flex; justify-content: center; align-items: center;" ><img src="{{ asset('img/logo.png') }}"></div> 
                    <div class="certificate-text">
                        <p>Get certified <br> Product management professional using <br> <span>Productlapse</span></p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center text-center certificate-btns">
                        <x-button type="link" href="{{ route('certificate.status') }}" class="btn_hover agency_banner_btn btn-bg">Get certified</x-button>
                        
                    </div>
                    <div class="certificate-terms">
                        <a href="#" data-toggle="modal" data-target="#myModal1">Conditions for obtaining the certificate</a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:list>
</x-feature.index>
    <!-- The Modal -->
    <div class="modal fade " id="myModal1">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Conditions for obtaining the certificate</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              <ul class="certificate-conditions">
                  <li>Subscription to a one-year package (basic, gold, or diamond)</li>
                  <li>Add data for at least one product with all other data: product information, product versions, view product reports</li>
                  <li>Attend the recorded training session</li>
                  <li>Filming a video of the added data with explanation</li>
                </ul>
            </div>
      
          </div>
        </div>
      </div>
@endsection 