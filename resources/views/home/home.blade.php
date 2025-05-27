@extends('layouts.master')

@php
$baseUrl = config('app.base_url');
@endphp

@section('title')
<title>Home | E-Shopper</title>
@endsection()

@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection()

@section('js')
<script src="{{asset('home/home.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@endsection()

@if (session('error'))
<div id="flash-message" class="alert alert-danger custom-alert">
    {{ session('error') }}
</div>

<script>
    setTimeout(function() {
        const msg = document.getElementById('flash-message');
        if (msg) {
            msg.style.display = 'none';
        }
    }, 5000); // 5000ms = 5s
</script>
@endif

@if (session('success'))
<div id="flash-message" class="alert alert-success custom-alert">
    {{ session('success') }}
</div>

<script>
    setTimeout(function() {
        const msg = document.getElementById('flash-message');
        if (msg) {
            msg.style.display = 'none';
        }
    }, 5000); // 5000ms = 5s
</script>
@endif


@section('content')

<!--slider-->
@include('home.components.slider');
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            @include('components.sidebar');

            <div class="col-sm-9 padding-right">
                <!--features_items-->
                @include('home.components.feature_product')
                <!--features_items-->

                <!--category-tab-->
                @include('home.components.category_tab')
                <!--/category-tab-->

                <!--recommended_items-->
                @include('home.components.recommend_product')
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>



@endsection