@extends('dashboard.layouts.custom-app')

@section('styles')
    {{-- <style>
        .login-form {
            display: none;
        }
    </style> --}}
@endsection

@section('class')
    <div class="error-page1 main-body bg-light text-dark">
    @endsection

    @section('content')

        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{ asset('backend/assets/img/media/login.png') }}"
                                class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                    <div class="card-sigin">
                                        <div class="mb-5 d-flex">
                                            <a href="{{ route('admin.index') }}"><img
                                                    src="{{ asset('backend/assets/img/brand/favicon.png') }}"
                                                    class="sign-favicon-a ht-40" alt="logo">
                                                <img src="{{ asset('backend/assets/img/brand/favicon-white.png') }}"
                                                    class="sign-favicon-b ht-40" alt="logo">
                                            </a>
                                            <h1 class="main-logo1 ms-1 me-0 my-auto tx-28">Va<span>le</span>x</h1>
                                        </div>
                                        <div class="card-sigin">
                                            <div class="main-signup-header">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <h2>{{ trans('dashboard/signin.Welcome back') }} !</h2>


                                                {{-- form user --}}
                                                <h5 class="fw-semibold mb-4">
                                                    {{ trans('dashboard/signin.Please sign in to continue') }}.</h5>
                                                <form action="{{ route('signin') }}" method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard/signin.Role') }}</label> <select
                                                            class="form-control" name="user_type" id="choose-role">
                                                            <option value="">
                                                                {{ trans('dashboard/signin.Select Your Role') }}
                                                            </option>
                                                            <option value="admin">
                                                                {{ trans('dashboard/signin.Admin') }}</option>
                                                            <option value="user">{{ trans('dashboard/signin.User') }}
                                                            </option>
                                                            <option value="doctor">{{ trans('dashboard/signin.Doctor') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard/signin.Email') }}</label> <input
                                                            class="form-control" name="email"
                                                            placeholder="{{ trans('dashboard/signin.Enter your email') }}"
                                                            type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard/signin.Password') }}</label> <input
                                                            class="form-control" name="password"
                                                            placeholder="{{ trans('dashboard/signin.Enter your password') }}"
                                                            type="password">
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-main-primary btn-block">{{ trans('dashboard/signin.Sign In') }}</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <a href="#" class="btn btn-block"><i
                                                                    class="fab fa-facebook-f"></i>
                                                                {{ trans('dashboard/signin.Signup with Facebook') }}</a>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <a href="#" class="btn btn-info btn-block btn-b"><i
                                                                    class="fab fa-twitter"></i>
                                                                {{ trans('dashboard/signin.Signup with Twitter') }}</a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a
                                                            href="{{ url('forgot') }}">{{ trans('dashboard/signin.Forgot password') }}?</a>
                                                    </p>
                                                    <p>{{ trans('dashboard/signin.Don\'t have an account') }}? <a
                                                            href="{{ route('signupPage') }}">{{ trans('dashboard/signin.Create an Account') }}</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->
                    </div>
                </div><!-- End -->
            </div>
        </div>

    @endsection('content')

    @section('scripts')
        <script>
            $('#choose-role').change(function() {
                var role = $(this).val();
                $('.login-form').each(function() {
                    role === $(this).attr('id') ? $(this).show() : $(this).hide();
                });
            });
        </script>
    @endsection
