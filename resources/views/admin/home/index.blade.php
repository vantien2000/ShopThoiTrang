@extends('admin.layouts.master')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Tổng hóa đơn</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white f-size">{{ empty($totalOrders) ? 0 : count($totalOrders) }}</h2>
                            <p class="text-white mb-0">{{ date_format(now(), "d/m/Y") }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-bag"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Sản phẩm</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white f-size">{{ empty($totalQuantityOrderDay) ? 0 : $totalQuantityOrderDay[0]['quantity'] }}</h2>
                            <p class="text-white mb-0">{{ date_format(now(), "d/m/Y") }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Doanh thu trong ngày</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white f-size">{{ empty($totalNow) ? 0 : number_format($totalNow[0]['total'], 0, ',' , '.') }} VNĐ</h2>
                            <p class="text-white mb-0">{{ date_format(now(), "d/m/Y") }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Doanh thu trong tháng</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white f-size">{{  empty($totalMonthNow) ? 0 : number_format($totalMonthNow[0]['total'], 0, ',' , '.') }} VNĐ</h2>
                            <p class="text-white mb-0">{{ date_format(now(), "m/Y") }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-usd"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="chart-wrapper">
                                <canvas data-chart="{{ empty($chartLeft) ? 0 : json_encode($chartLeft) }}" id="chart_left" width="1046px" height="280px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card py-2">
                            <div class="text-center">{{ date_format(now(), "d/m/Y") }}</div>
                            <div class="chart-wrapper">
                                <canvas data-chart="{{ empty($chartRight) ? 0 : json_encode($chartRight) }}" id="chart_right" width="1046px" height="280px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5>DOANH SỐ BÁN HÀNG</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-sales">
                                <thead>
                                    <tr>
                                        <th scope="col">Ngày</th>
                                        <th scope="col">Số sản phẩm</th>
                                        <th scope="col">Số lượng bán</th>
                                        <th scope="col">Doanh thu (VNĐ)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productOrdersInMonth as $sales)
                                    <tr>
                                        <td>{{ date("d/m/Y", strtotime($sales->order_date)) }}</td>
                                        <td>{{ $sales->quantity_product }}</td>
                                        <td>{{ $sales->quantity_order }}</td>
                                        <td>{{ number_format(round($sales->total,0), 0, ',', '.') }}</td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5>SẢN PHẨM BÁN CHẠY</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-sellProducts">
                                <thead>
                                    <tr>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Số lượng bán</th>
                                        <th scope="col">Tổng tiền (VNĐ)</th>
                                        <th scope="col">Hiển thị</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sellProducts as $product)
                                    <tr>
                                        <td><img class="img-preview" src="{{ asset('userfiles/images/products/' . $product->image) }}" width="80" height="80" alt="product_image"></td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->total }}</td>
                                        <td>{{ $product->total * (1 - $product->sale/100) * $product->price }}</td>
                                        <td><a data-url="{{ route('admin.detail.products', ['id' => $product->product_id]) }}" class="detail-btn" data-toggle="tooltip" data-placement="top" title="detail"><i class="fa fa-eye color-muted m-r-5"></i> </a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection