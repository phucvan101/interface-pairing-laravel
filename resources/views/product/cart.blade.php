@extends('layouts.master')

@php
$baseUrl = config('app.base_url');
@endphp

@section('title')
<title>Cart | E-Shopper</title>
@endsection()

@section('css')
@endsection()

@section('js')
<script>
    window.cartUpdateUrl = "{{ route('cart.update') }}"; // khai bao trong file blade de file js hieu
    window.cartDeleteUrl = "{{ route('cart.delete') }}";
    window.csrfToken = "{{ csrf_token() }}";
</script>
<script src="{{ asset('cart/cart.js') }}"></script>
@endsection


@section('content')


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="name">Name</td>
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
                    <tr data-id="{{$id}}">
                        <td class="cart_product">
                            <a href=""><img style="width: 70px;" src="{{$baseUrl .$cartItem['image']}}" alt=""></a>

                        </td>
                        <td class="cart_name">
                            <h4><a href="">{{$cartItem['name']}}</a></h4>

                        </td>
                        <td class="cart_price">
                            <p>{{number_format($cartItem['price'])}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <!-- <a class="cart_quantity_up" href=""> + </a> -->
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$cartItem['quantity']}}" autocomplete="off" size="2">
                                <!-- <a class="cart_quantity_down" href=""> - </a> -->
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($cartItem['price'] * $cartItem['quantity'])}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="col-md-12">
                <h2>Total: {{number_format($total)}} VND</h2>
            </div>
        </div>
    </div>
</section>
<!--/#cart_items-->

<!-- <section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--/#do_action-->



@endsection