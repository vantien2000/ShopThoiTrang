@extends('admin.layouts.master')
@section('content')
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @include('admin.links.index')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.edit.invoices.post', ['id' => $order->order_id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3>Sửa Đơn Hàng</h3>
                                    <div class="btn-form">
                                        <a href="{{ route('admin.invoices') }}" class="text-d-none btn btn-primary w-10">Back</a>
                                        <button class="btn btn-info submit w-10">Edit</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="order_id">Mã đơn hàng (<span class="text-danger">*</span>)</label>
                                                <input type="text" class="form-control" disabled name="order_id" value="{{ $order->order_id }}" placeholder="Tên sản phẩm">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="type_id">Tài Khoản (<span class="text-danger">*</span>)</label>
                                                <input type="text" class="form-control" disabled name="product_name" value="{{ $order->users->user_name }}" placeholder="Tên sản phẩm">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="product_name">Email khách hàng (<span class="text-danger">*</span>)</label>
                                                <input type="text" class="form-control" disabled name="product_name" value="{{ $order->users->email }}" placeholder="Tên sản phẩm">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="type_id">Ngày đặt</label>
                                                <input type="text" class="form-control" disabled name="product_name" value="{{ date('d/m/Y', strtotime($order->order_date)) }}" placeholder="Tên sản phẩm">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="type_id">Địa chỉ giao hàng (<span class="text-danger">*</span>)</label>
                                            <input type="text" class="form-control" disabled name="product_name" value="{{ $order->address_ship }}" placeholder="Tên sản phẩm">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6 form-group">
                                                <label for="size">Thành Tiền (VNĐ) (<span class="text-danger">*</span>)</label>
                                                <input type="text" class="form-control" disabled value="{{ number_format(subtotal_order($order->orderDetails) + $order->shipper_cost, 0, ',', '.') }}" name="quantity" placeholder="Số lượng">
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label for="quantity">Trạng Thái</label>
                                                <select name="result" class="form-control">
                                                    <option {{ $order->result == 0 ? 'selected' : '' }} value="0">Đã Hủy</option>
                                                    <option {{ $order->result == 1 ? 'selected' : '' }} value="1">Chờ</option>
                                                    <option {{ $order->result == 2 ? 'selected' : '' }} value="2">Hoàn Thành</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày Nhận Hàng</label>
                                            <input type="date" class="form-control" value="{{ old('required_date') }}" min="{{ $order->order_date }}" name="required_date" placeholder="Ngày Nhận Hàng"/>
                                            {!! $errors->first('required_date','<span class="text-danger">:message</span>') !!}
                                        </div> 
                                        <div class="form-group">
                                            <label for="add_infor">Ngày giao hàng</label>
                                            <input type="date" name="shipper_date" value="{{ old('shipper_date') }}" min="{{ $order->order_date }}" class="form-control" placeholder="Ngày Giao Hàng"/>
                                            {!! $errors->first('shipper_date','<span class="text-danger">:message</span>') !!}
                                            {!! $errors->first('mgs','<span class="text-danger">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection
