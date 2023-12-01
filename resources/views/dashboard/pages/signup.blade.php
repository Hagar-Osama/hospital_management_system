@extends('dashboard.layouts.custom-app')

@section('styles')

@endsection

@section('class')

		<div class="error-page1 main-body">

@endsection

@section('content')

        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{asset('backend/assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
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
                                            <a href="{{url('index')}}"><img src="{{asset('backend/assets/img/brand/favicon.png')}}" class="sign-favicon-a ht-40" alt="logo">
                                            <img src="{{asset('backend/assets/img/brand/favicon-white.png')}}" class="sign-favicon-b ht-40" alt="logo">
                                            </a>
                                            <h1 class="main-logo1 ms-1 me-0 my-auto tx-28">Va<span>le</span>x</h1>
                                        </div>
                                        <div class="main-signup-header">
                                            <h2 class="text-primary">{{trans('dashboard/signup.Get Started')}}</h2>
                                            <h5 class="fw-normal mb-4">{{trans('dashboard/signup.It\'s free to signup and only takes a minute')}}.</h5>
                                            <form action="{{route('signup')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{trans('dashboard/signup.Firstname & Lastname')}}</label> <input class="form-control" name="name" placeholder="{{trans('dashboard/signup.Enter your firstname and lastname')}}" type="text">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>{{trans('dashboard/signup.Email')}}</label> <input class="form-control" placeholder="{{trans('dashboard/signup.Enter your email')}}" name="email" type="text">
                                                    @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>{{trans('dashboard/signup.Password')}}</label> <input class="form-control" placeholder="{{trans('dashboard/signup.Enter your password')}}" name="password" type="password">
                                                    @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-main-primary btn-block">{{trans('dashboard/signup.Create Account')}}</button>
                                                <div class="row row-xs">
                                                    <div class="col-sm-6">
                                                        <button class="btn btn-block"><i class="fab fa-facebook-f"></i> {{trans('dashboard/signup.Signup with Facebook')}}</button>
                                                    </div>
                                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                        <button class="btn btn-info btn-block btn-b"><i class="fab fa-twitter"></i> {{trans('dashboard/signup.Signup with Twitter')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="main-signup-footer mt-5">
                                                <p>{{trans('dashboard/signup.Already have an account')}}? <a href="{{route('signinPage')}}">{{trans('dashboard/signup.Sign In')}}</a></p>
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

		<!--- JQuery sparkline js --->
		<script src="{{asset('backend/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

@endsection
