@extends('admin.layouts.master')
@section('content')
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @include('admin.links.index')
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body pb-0 d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-1">HÓA ĐƠN</h4>
                                        <p>Tổng số doanh thu trong tháng này </p>
                                        <h3 class="m-0">{{ number_format($totalMonthNow[0]['total'], 0, ',', '.') }} VNĐ</h3>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas data-chart="{{ json_encode($statistic) }}" id="chart_invoices" width="1046px" height="280px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.statistic.filter')
                            <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-invoice">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tháng</th>
                                    <th scope="col">Tổng doanh thu (VNĐ)</th>
                                    <th scope="col">Số sản phẩm đã bán</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($statistic as $item)
                                <tr>
                                    <td scope="col">{{ $count++ }}</td>
                                    <td scope="col">{{ 'Tháng ' . $item['month'] }}</td>
                                    <td scope="col">{{ number_format($item['total'], 0, ',', '.') }}</td>
                                    <td scope="col">{{ $item->quantity . ' sản phẩm' }}</td>
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
    <!--**********************************
        Content body end
    ***********************************-->
@endsection