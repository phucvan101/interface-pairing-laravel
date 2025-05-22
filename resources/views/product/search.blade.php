@extends('layouts.master')

@section('title')
<title>Search Results</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('product/product.css')}}">
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
<script src="{{asset('home/home.js')}}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <h2>Search results for "{{ $query }}"</h2>
        <div class="products-search">
            <div class="row justify-content-start">
                @forelse($products as $product)
                <div class="col-sm-3 d-flex align-items-stretch">
                    <div class="product-image-wrapper w-100">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" />
                                <h2>{{ number_format($product->price) }} VND</h2>
                                <p>{{ $product->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p>No products found.</p>
                </div>
                @endforelse
            </div>
            <div class="mt-3">
                {{$products->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
</div>
@endsection