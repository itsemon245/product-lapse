@extends('layouts.frontend.app')


@section('main')
<section class="pt-[140px] pb-[60px]">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <h1 class="t_color3 f_700 pb-2">{{ $page->title->{app()->getLocale()} }}</h1>
             {!! $page->body->{app()->getLocale()} !!}                  </div>
       </div>
    </div>
 </section>
@endsection
