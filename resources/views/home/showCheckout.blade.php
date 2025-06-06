@extends('layouts.master')

@php
$baseUrl = config('app.base_url');
@endphp

@section('title')
<title>Checkout | E-Shopper</title>
@endsection()

@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<style>
    input.form-control {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 16px;
        width: 100%;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input.form-control:focus {
        border-color: #f0ad4e;
        /* màu vàng của Bootstrap warning */
        box-shadow: 0 0 8px rgba(240, 173, 78, 0.5);
        outline: none;
    }

    input.is-invalid {
        border-color: #dc3545;
    }

    .alert.alert-danger {
        margin-top: 8px;
        padding: 6px 12px;
        font-size: 14px;
    }

    .form-one .mb-3 {
        margin-bottom: 20px;

    }
</style>
@endsection()

@section('js')
<script src="{{asset('home/home.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@endsection()


@section('content')


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->



        <form action="{{route('createOrder')}}" method="POST">
            @csrf
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Bill To</p>
                            <div class="form-one" style="width: 100%;">
                                <div class="mb-3">
                                    <input type="text" class="form-control 
                                     @error('customer_name') is-invalid @enderror" name="customer_name" placeholder="Full Name" value="{{ old('customer_name') }}">
                                    @error('customer_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control @error('customer_email') is-invalid @enderror" name="customer_email" placeholder="Email" value="{{ old('customer_email') }}">
                                    @error('customer_email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('customer_phone') is-invalid @enderror" name="customer_phone" placeholder="Phone" value="{{ old('customer_phone') }}">
                                    @error('customer_phone')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('customer_address') is-invalid @enderror" name="customer_address" placeholder="Address" value="{{ old('customer_address') }}">
                                    @error('customer_address')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        @endphp
                        @foreach($carts as $id => $cartItem)
                        @php
                        $total += $cartItem['price'] * $cartItem['quantity']
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <a href=""><img style="width: 70px;" src="{{$baseUrl .$cartItem['image']}}" alt=""></a>

                            </td>
                            <td class="cart_name">
                                <h4><a href="">{{$cartItem['name']}}</a></h4>

                            </td>
                            <td class="cart_price">
                                <p>${{number_format($cartItem['price'])}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <p>{{$cartItem['quantity']}}</p>

                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">${{number_format($cartItem['price'] * $cartItem['quantity'])}} </p>
                            </td>

                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Cart Sub Total</td>
                                        <td>${{number_format($total)}} </td>
                                    </tr>
                                    <tr class="shipping-cost">
                                        <td>Shipping Cost</td>
                                        <td>Free</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><span>${{number_format($total)}} </span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <div class="payment-options">
            <span>
                <label><input type="checkbox"> Direct Bank Transfer</label>
            </span>
            <span>
                <label><input type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input type="checkbox"> Paypal</label>
            </span>
        </div> -->
            <div style="margin-top: 30px; display: flex; justify-content: flex-end; gap: 20px;">

                <a href="{{ route('showCart') }}" class="btn btn-default btn-lg" style="padding: 12px 36px; font-size: 16px; font-weight: bold;">
                    Return to Cart
                </a>
                <button type="submit" class="btn btn-warning btn-lg" style="padding: 12px 36px; font-size: 16px; font-weight: bold;">
                    Place Order
                </button>
            </div>
        </form>
    </div>
</section> <!--/#cart_items-->




@endsection