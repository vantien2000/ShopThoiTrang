@extends('users.layouts.master')
@section('content')
<div class="main-container page-cart">
    <div class="container-checkout-wrapper">
        @include('users.layouts.pageLink')
        <div class="row customer_checkout mt-4">
            <div class="col-lg-6 col-sm-6 p-0 m-0 checkout_element">
                <h4 class="f-bolder">Thông Tin Khách Hàng</h4>
                <form id="order_custom" action="{{ route('users.post.register') }}" class="order_custom mt-4" method="POST">
                    @csrf
                    <div class="row form-group mr-1">
                        <div class="col-lg-6 pr-0">
                            <label for="email">Họ Tên</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
                        </div>
                        <div class="col-lg-6 pr-0">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group mr-1">
                        <label for="email">Số điện thoại</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
                    </div>
                    <div class="form-group mr-1">
                        <label for="email">Địa chỉ</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
                    </div>
                    <span class="f-bolder">Loại Thanh Toán</span>
                    <div class="row payment mr-1">
                        <div class="col-lg-6 pr-0 d-flex align-items-center">
                            <input type="radio" class="mr-2" name="status" placeholder="Email">
                            <label class="m-0" for="status">Trực Tiếp</label>
                            {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
                        </div>
                        <div class="col-lg-6 pr-0 d-flex align-items-center">
                            <input type="radio" class="mr-2" name="status" id="payment" placeholder="Email">
                            <label class="m-0" for="status">Banking</label>
                            {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-sm-6 p-0 order-right checkout_element">
                <h4 class="f-bolder">Thông Tin Đơn Hàng</h4>
                <div class="order-right-wrapper">
                    <table class="table table-cart table-order">
                        <tr>
                            <td class="py-0">
                                <img src="https://vcdn-kinhdoanh.vnecdn.net/2019/11/06/mau-500-8539-1573015927.jpg" width="60px" height="60px" class="mr-3" alt="product_image">
                                <span class="product_name">AAAAAAAAAAAAAAAAAAAAAAAAAAAA<br>Size</span>
                            </td>
                            <td><span class="price total"></span>1111111<sup>vnđ</sup></td>
                        </tr>
                        <tr>
                            <td class="py-0">
                                <img src="https://vcdn-kinhdoanh.vnecdn.net/2019/11/06/mau-500-8539-1573015927.jpg" width="60px" height="60px" class="mr-3" alt="product_image">
                                <span class="product_name">AAAAAAAAAAAAAAAAAAAAAAAAAAAA<br>Size</span>
                            </td>
                            <td><span class="price total"></span>1111111<sup>vnđ</sup></td>
                        </tr> 
                        <tr>
                            <td>
                                <img src="https://vcdn-kinhdoanh.vnecdn.net/2019/11/06/mau-500-8539-1573015927.jpg" width="60px" height="60px" class="mr-3" alt="product_image">
                                <span class="product_name">AAAAAAAAAAAAAAAAAAAAAAAAAAAA<br>Size</span>
                            </td>
                            <td><span class="price total"></span>1111111<sup>vnđ</sup></td>
                        </tr>  
                    </table>
                    <table class="table m-0 text-center total-table">
                        <thead>
                            <tr>
                                <th>Thành tiền</th>
                                <th>Vận chuyển</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">12000000 <sup>vnđ</sup></td>
                                <td>12000000 <sup>vnđ</sup></td>
                                <td>12000000 <sup>vnđ</sup></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection