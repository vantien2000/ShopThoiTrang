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
                            @include('admin.invoices.filter')
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-invoice">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã đơn hàng</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Giá đơn hàng (VNĐ)</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Ngày đặt</th>
                                            <th scope="col">Ngày lấy hàng</th>
                                            <th scope="col">Ngày giao hàng</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $invoice)
                                        <tr>
                                            <td scope="col">{{ $invoice->order_id }}</td>
                                            <td scope="col">{{ $invoice->users->email }}</td>
                                            <td scope="col">{{ number_format(subtotal_order($invoice->orderDetails) + $invoice->shipper_cost, 0, ',', '.') }}</td>
                                            <td scope="col">{{ $invoice->address_ship }}</td>
                                            <td scope="col">{{ $invoice->order_date != '' ? date('d/m/Y', strtotime($invoice->order_date)) : '' }}</td>
                                            <td scope="col">{{ $invoice->required_date != '' ? date('d/m/Y', strtotime($invoice->required_date)) : '' }}</td>
                                            <td scope="col">{{ $invoice->shipper_date != '' ? date('d/m/Y', strtotime($invoice->shipper_date)) : '' }}</td>
                                            <td scope="col">
                                                @if ($invoice->result == 0)
                                                    <span class="text-danger f-bolder">Đã hủy</span>
                                                @elseif ($invoice->result == 1)
                                                    <span class="text-warning f-bolder">Chờ</span>
                                                @else
                                                    <span class="text-success f-bolder">Hoàn thành</span>
                                                @endif
                                            </td>
                                            <td scope="col">
                                                <a href="{{ route('admin.invoices.details', ['id' => $invoice->order_id]) }}"  class="detail-btn" data-toggle="tooltip" data-placement="top" title="detail"><i class="fa fa-eye color-muted m-r-5"></i> </a>
                                                <a data-toggle="tooltip" href="{{ route('admin.edit.invoices', ['id' => $invoice->order_id]) }}" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                <a href="javascript:void(0)" data-delete-url="{{ route('admin.delete.invoices', ['id' => $invoice->order_id]) }}" data-order-id="{{ $invoice->order_id }}" class="delete-btn" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @include('admin.pagination.index', ['paginator' => $invoices])
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