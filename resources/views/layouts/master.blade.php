<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Students</title>
        @php
        $rtl_ext = app()->getLocale() == 'en' ? '' : '-rtl';
        @endphp
        <!-- Styles -->
        <link href="{{asset('assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/lib/themify-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/lib/menubar/sidebar' . $rtl_ext . '.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/lib/bootstrap' . $rtl_ext . '.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/style' . $rtl_ext . '.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/custom' . $rtl_ext . '.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/custom2' . $rtl_ext . '.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/custom1' . $rtl_ext . '.css')}}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
    </head>

    <link rel="stylesheet" href="{{asset('assets/css/jquery-confirm.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    @stack('css')
</head>

<body>

<x-sidebar />



@include('layouts.header')

@yield('content')

<div class="loading_box_overlay"></div>
<div class="loading_box">
    <img src="{{asset('assets/images/loader.gif')}}" alt="Loading" />
</div>
<!-- jquery vendor -->
<script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/jquery.nanoscroller.min.js') }}"></script>
<!-- nano scroller -->
<script src="{{ asset('assets/js/lib/menubar/sidebar.js') }}"></script>
<script src="{{ asset('assets/js/lib/preloader/pace.min.js') }}"></script>
<!-- sidebar -->
<script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>


<!-- bootstrap -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<!-- scripit init-->
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
{{-- Dattable --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> --}}
{{-- JQuery validation --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
{{-- Sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- select2 --}}

<script src="{{asset('assets/js/jquery-confirm.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.js')}}"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
const Toast = Swal.mixin({
toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        onOpen: (toast) => {
toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
});
</script>

@stack('scripts');
</body>

</html>