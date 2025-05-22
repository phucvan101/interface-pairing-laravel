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