@extends('layouts.master')

@php
$baseUrl = config('app.base_url');
@endphp

@section('title')
<title>Login | E-Shopper</title>
@endsection()

@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection()

@section('js')
<script src="{{asset('home/home.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@endsection()


@section('content')



<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email Address" />
                        <input type="text" name="password" placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{route('signUp')}}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Name" />
                        <input type="email" name="email" placeholder="Email Address" />
                        <input type="password" name="password" placeholder="Password" />
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->


@endsection