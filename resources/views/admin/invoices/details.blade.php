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
                            <div class="content-print">
                                <div class="card-title-invoice text-center">
                                    <h3>HÓA ĐƠN BÁN HÀNG</h3>
                                    <p class="infor-text">Tại cửa hàng mie fashionshop - Số 298 Đ. Cầu Diễn, Minh Khai, Bắc Từ Liêm, Hà Nội</p>
                                </div>
                                <div class="invoice_infor d-flex justify-content-between">
                                    <table width="50%">
                                        <tr>
                                            <td width="15%"><b>Họ Tên: </b></td>
                                            <td>{{ $orders->users->user_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Email: </b></td>
                                            <td>{{ $orders->users->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>SĐT: </b></td>
                                            <td>{{ $orders->users->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Đại chỉ: </b></td>
                                            <td>{{ $orders->address_ship }}</td>
                                        </tr>
                                    </table>
                                    <table width="50%">
                                        <tr>
                                            <td class="text-right"><b>Mã hóa đơn: </b></td>
                                            <td class="pl-4" width="20%">HĐ{{ $orders->order_id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><b>Ngày đặt: </b></td>
                                            <td class="pl-4">{{ date("d/m/Y", strtotime($orders->order_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><b>Trạng thái: </b></td>
                                            <td class="pl-4"><span class="text-success">@if ($orders->result == 0)
                                            <span class="text-danger">Đã hủy</span>
                                            @elseif ($orders->result == 1)
                                            <span class="text-warning">Chờ thanh toán</span>
                                            @else
                                            <span class="text-success">Hoàn thành</span>
                                            @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="table-responsive mt-5">
                                    <table class="table table-bordered verticle-middle table-products">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Ảnh</th>
                                                <th scope="col">Tên sản phẩm</th>
                                                <th scope="col">Giá gốc (VNĐ)</th>
                                                <th scope="col">Giảm giá (%)</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Thành tiền (VNĐ)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $count = 1;
                                                $subtotal = 0;
                                            @endphp
                                            @foreach ($orders->orderDetails as $details)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td><img class="img-preview" src="{{ asset('userfiles/images/products/' . $details->products->image) }}" width="80" height="80" alt="product_image"></td>
                                                <td>{{ $details->products->product_name }}</td>
                                                <td>{{ number_format($details->products->price, 0, ',', '.') }}</td>
                                                <td>{{ $details->products->sale }}</td>
                                                <td>{{ $details->quantity }}</td>
                                                @php
                                                    $totalElement = $details->quantity * $details->products->price*(1 - $details->products->sale/100);
                                                    $subtotal += $totalElement;
                                                @endphp
                                                <td>{{ number_format($totalElement, 0, ',', '.') }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive mt-3 d-flex justify-content-end">
                                    <table width="20%" class="text-right">
                                        <tr>
                                            <td><b>Tạm Tính: </b></td>
                                            <td>{{ number_format($subtotal, 0, ',', '.') }} VNĐ</td>
                                        </tr>
                                        <tr>
                                            <td><b>Phí Vận Chuyển: </b></td>
                                            @php
                                                $shipCost = $subtotal > LIMIT_SHIP_COST ? DEFAULT_SHIP_COST : 0;
                                            @endphp
                                            <td>{{ number_format($shipCost, 0, ',', '.') }} VNĐ</td>
                                        </tr>
                                        <tr>
                                            <td><b>Thành Tiền: </b></td>
                                            <td>{{ number_format($subtotal + $shipCost, 0, ',', '.') }} VNĐ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="export mt-3 d-flex align-items-center justify-content-end">
                                <a class="btn btn-primary btn-print" href="">In hóa đơn
                                </a>
                            </div>
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
