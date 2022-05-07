@extends('users.layouts.master')
@section('content')
@include('users.layouts.pageLink')
<div class="main-container page-invoice">
    <div class="container-wrapper">
        <div class="list-invoices">
            @foreach ($orders as $order)
                <div class="invoice">
                    <div class="status-invoice d-flex align-items-center justify-content-between">
                        <div class="user_ordered d-flex align-items-center">
                            <div class="user_avatar mr-3">
                                <img src="{{ asset('/userfiles/images/users/' . $order->users->avatar) }}" width="60px" height="60px" alt="">
                            </div>
                            <div class="user_infor">
                                <p class="m-0"><span class="f-bolder">Email: </span>{{ $order->users->email }}</p>
                                <p class="m-0"><span class="f-bolder">Phone Number: </span>{{ $order->users->phone_number }}</p>
                                <p class="m-0"><span class="f-bolder">Address: </span>{{ $order->address_ship }}</p>
                            </div>
                        </div>
                        <div class="order_infor">
                            <p class="m-0"><span class="f-bolder">Invoice ID: </span>{{ $order->order_id }}</p>
                            <p class="m-0"><span class="f-bolder">Order Date: </span>{{ $order->order_date }}</p>
                            <p class="m-0"><span class="f-bolder">Status: </span><span class="status_order">Đang giao</span></p>
                        </div>
                    </div>
                    <div class="content-invoice">
                        <table class="table table-cart">
                            <tr>
                                <th>SẢN PHẨM</th>
                                <th>GIÁ</th>
                                <th>SỐ LƯỢNG</th>
                                <th>TỔNG</th>
                            </tr>
                            @foreach ($order->orderDetails as $key => $invoice)
                                <tr>
                                    <td>
                                        <img src="{{ asset('/userfiles/images/products/' . $invoice->products->image) }}" width="60px" height="60px" class="mr-3" alt="product_image">
                                        <span class="product_name">{{ $invoice->products->product_name }}<br>Size-{{ $invoice->products->size }}</span>
                                    </td>
                                    <td><span class="price">{{ number_format(price_sale($invoice->products->price, $invoice->products->sale),  0, ',', '.') }}</span><sup>vnđ</sup></td>
                                    <td><span class="f-bolder">{{ $invoice->quantity }}</span></td>
                                    <td><span class="price total-{{ $key }}">{{ number_format(price_sale($invoice->products->price, $invoice->products->sale) * $invoice->quantity,  0, ',', '.') }}</span><sup>vnđ</sup></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="btn-remove-invoice text-right">
                        <a data-order-id="{{ $order->order_id }}" class="btn btn-dark remove-invoice" href="javascript:void(0)">Hủy đơn</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection