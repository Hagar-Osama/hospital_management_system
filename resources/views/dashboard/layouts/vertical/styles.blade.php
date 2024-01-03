<title>@yield('title')</title>
@livewireStyles
{{-- <!-- Internal Data table css -->
<link href="{{ asset('backend/assets/plugins/datatable/datatables.min.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/datatable/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet"> --}}
@if (app()->getLocale() == 'ar')
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('backend/assets/img/brand/favicon.png') }}" type="image/x-icon" />

    <!-- Icons css -->
    <link href="{{ asset('backend/assets/plugins/icons/icons.css') }}" rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">

    <!--  Right-sidemenu css -->
    <link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

    <!--  Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css-rtl/sidemenu.css') }}">

    <!--- Style css --->
    <link href="{{ asset('backend/assets/css-rtl/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css-rtl/boxed.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css-rtl/dark-boxed.css') }}" rel="stylesheet">

    <!--- Dark-mode css --->
    <link href="{{ asset('backend/assets/css-rtl/style-dark.css') }}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ asset('backend/assets/css-rtl/skin-modes.css') }}" rel="stylesheet" />

    @yield('styles')

    <!--- Animations css-->
    <link href="{{ asset('backend/assets/css/animate.css') }}" rel="stylesheet">
@else
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('backend/assets/img/brand/favicon.png') }}" type="image/x-icon" />

    <!-- Icons css -->
    <link href="{{ asset('backend/assets/plugins/icons/icons.css') }}" rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!--  Right-sidemenu css -->
    <link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/sidemenu.css') }}">

    @yield('styles')

    <!--- Style css --->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/boxed.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/dark-boxed.css') }}" rel="stylesheet">

    <!--- Dark-mode css --->
    <link href="{{ asset('backend/assets/css/style-dark.css') }}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ asset('backend/assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- Animations css-->
    <link href="{{ asset('backend/assets/css/animate.css') }}" rel="stylesheet">
@endif
