<link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
<!-- Fonts -->
 <link rel="preconnect" href="https://fonts.bunny.net">
 <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
 <script src="{{asset('js/htmx.js')}}">
 </script>

@notifyCss
 <!-- Scripts -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])
 
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
 <link rel="stylesheet" href="{{ asset('vendors/bootstrap-selector/css/bootstrap-select.min.css') }}">
 @if (app()->getLocale() == 'ar')
     <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
 @endif
 <!--icon font css-->
 <link rel="stylesheet" href="{{ asset('vendors/themify-icon/themify-icons.css') }}">
 <link rel="stylesheet" href="{{ asset('vendors/elagent/style.css') }}">
 <link rel="stylesheet" href="{{ asset('vendors/flaticon/flaticon.css') }}">
 <link rel="stylesheet" href="{{ asset('vendors/animation/animate.css') }}">
 <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/assets/owl.carousel.min.css') }}">
 <link rel="stylesheet" href="{{ asset('vendors/magnify-pop/magnific-popup.css') }}">
 <link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css') }}">
 <link rel="stylesheet" href="{{ asset('vendors/scroll/jquery.mCustomScrollbar.min.css') }}">
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

 @if (app()->getLocale() == 'ar')
     <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
 @endif
 @stack('styles')