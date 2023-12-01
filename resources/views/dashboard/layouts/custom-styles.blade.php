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
    <!--- Favicon --->
    <link rel="icon" href="{{ asset('backend/assets/img/brand/favicon.png') }}" type="image/x-icon" />

    <!--- Icons css --->
    <link href="{{ asset('backend/assets/plugins/icons/icons.css') }}" rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--- Right-sidemenu css --->
    <link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/sidemenu.css') }}">

    <!--- Style css --->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/boxed.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/dark-boxed.css') }}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ asset('backend/assets/css/skin-modes.css') }}" rel="stylesheet">

    <!--- Dark-mode css --->
    <link href="{{ asset('backend/assets/css/style-dark.css') }}" rel="stylesheet">

    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ asset('backend/assets/plugins/sidemenu-responsive-tabs/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">

    @yield('styles')

    <!--- Animations css --->
    <link href="{{ asset('backend/assets/css/animate.css') }}" rel="stylesheet">

@endif
