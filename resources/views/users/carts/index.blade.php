@extends('users.layouts.master')
@section('content')
@include('users.layouts.pageLink')
<div class="main-container page-cart">
    <div class="container-wrapper">
        @if (session('carts'))
        <div class="wrapper-cart row">
            <div class="col-lg-8 col-sm-7">
                <table class="table table-cart">
                    <tr>
                        <th>SẢN PHẨM</th>
                        <th>GIÁ</th>
                        <th>SỐ LƯỢNG</th>
                        <th>TỔNG</th>
                        <th></th>
                    </tr>
                    @foreach ($carts as $key => $cart)
                    <tr class="cart-{{ $key }}">
                        <td>
                            <img src="{{ asset('/userfiles/images/products/' . $cart['products']['image']) }}" width="60px" height="60px" class="mr-3" alt="product_image">
                            <span class="product_name">{{ $cart['products']['product_name'] }}<br>Size-{{ $cart['size'] }}</span>
                        </td>
                        <td><span class="price">{{ number_format(price_sale($cart['products']['price'], $cart['products']['sale']),  0, ',', '.') }}</span><sup>vnđ</sup></td>
                        <td><input class="quantity" type="number" data-product-id="{{ $cart['products']['product_id'] }}" data-size="{{ $cart['size'] }}" id="quantity" value="{{ $cart['quantity'] }}" min="1" max="{{ $cart['products']['quantity'] }}"></td>
                        <td><span class="price total-{{ $key }}">{{ number_format(price_sale($cart['products']['price'], $cart['products']['sale']) * $cart['quantity'],  0, ',', '.') }}</span><sup>vnđ</sup></td>
                        <td><button data-key={{ $key }} class="remove_btn"><i class="fa fa-times"></i></button></td>
                    </tr> 
                    @endforeach
                </table>
            </div>
            <div class="col-lg-4 col-sm-5">
                <div class="total-wrapper">
                    <div class="cart-total">
                        <div class="title-cart-total">Thanh Toán</div>
                    </div>
                    <div class="subtotal d-flex">
                        <div class="subtotal-title">Thành Tiền:</div>
                        <span>{{ number_format(sub_total($carts), 0, ',', '.') }} <sup>vnđ</sup></span>
                    </div>
                    @php
                        $shipCost = sub_total($carts) > LIMIT_SHIP_COST ? 0 : DEFAULT_SHIP_COST;
                    @endphp
                    <div class="shipping d-flex">
                        <div class="shipping-title">Giao hàng:</div>
                        <span>{{ $shipCost = 0 ? 0 : number_format($shipCost, 0, ',', '.') }} <sup>vnđ</sup></span>
                    </div>
                    <div class="total d-flex">
                        <div class="total-title">Tổng Tiền:</div>
                        <span>{{ number_format($shipCost + sub_total($carts), 0, ',', '.') }} <sup>vnđ</sup></span>
                    </div>
                    <a href="" class="btn_pay">ĐẶT HÀNG</a>
                </div>
                <div class="continue-shop">
                    <a href="{{ route('users.home') }}" class="btn_continue">TIẾP THỤC MUA HÀNG</a>
                </div>
            </div>
        </div>
        @else
        <div class="empty-cart">
            <p class="f-boler empty-cart-name">GIỎ HÀNG TRỐNG! TIẾP TỤC MUC HÀNG</p>
            <div class="continue-shop empty-cart-btn">
                <a href="{{ route('users.home') }}" class="btn_continue">TIẾP TỤC MUA HÀNG</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection