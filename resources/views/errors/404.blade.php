@extends('dashboard.layouts.custom-app')

@section('styles')
    <!--- Internal Fontawesome css-->
    <link href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!---Internal Typicons css-->
    <link href="{{ asset('backend/assets/plugins/typicons.font/typicons.css') }}" rel="stylesheet">

    <!---Internal Feather css-->
    <link href="{{ asset('backend/assets/plugins/feather/feather.css') }}" rel="stylesheet">

    <!---Internal Falg-icons css-->
    <link href="{{ asset('backend/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
@endsection

@section('class')
    <div class="main-body bg-primary-transparent">
    @endsection

    @section('content')
        <!-- Main-error-wrapper -->
        <div class="main-error-wrapper page page-h">
            <img src="{{ asset('backend/assets/img/media/404.png') }}" class="error-page" alt="error">
            <h2>Oopps. The page you were looking for doesn't exist.</h2>
            <h6>You may have mistyped the address or the page may have moved.</h6><a class="btn btn-outline-danger"
                href="{{ auth()->guard('admin')->check()
                    ? route('admin.index', ['locale' => app()->getLocale()])
                    : route('user.index', ['locale' => app()->getLocale()]) }}">Back
                to Home</a>
        </div>
        <!-- /Main-error-wrapper -->
    @endsection('content')

    @section('scripts')
    @endsection
