@extends('front_end.layouts.app')


@section('head-links')
@endsection
@section('mainContent')
    <!-- Login start -->
    <div class="login-area pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">
                                <h2>login</h2>
                                <span>Please login using account detail bellow.</span>
                            </div>
                            <div class="login-form">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input type="email" id="email" name="email" placeholder="email">
                                    <input type="password" id="password" name="password" placeholder="Password">
                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            <input type="checkbox" id="remember">
                                            <label for="remember">Remember me</label>
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                        </div>
                                        <button type="submit" class="default-btn">Login</button>
                                    </div>
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
