@extends('front_end.layouts.app')


@section('head-links')
@endsection
@section('mainContent')
    <!-- Login start -->
    <div class="login-area pt-2 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">
                                @if (session('status'))
                                    <span class="text-success">{{ session('status') }}</span>
                                @endif
                                <h2>Forgot Password?</h2>
                                <span>No problem. Just let us know your email address and we will
                                    email you a password reset link that will allow you to choose a new one.</span>
                            </div>
                            <div class="login-form">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <input type="email" id="email" name="email" placeholder="email" required
                                        autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <button class="btn btn-primary w-100 mb-3">Reset</button>
                                    <div class="text-center"><a class="fs--1 fw-bold" href="/register">Create an account</a>
                                    </div>
                                    <div class="text-center"><a class="fs--1 fw-bold" href="/">Back</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login end -->
@endsection


@section('footer-links')
    <x-back-end.message.message />
@endsection
