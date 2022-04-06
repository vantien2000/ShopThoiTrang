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
                            @include('admin.products.filter')
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-products">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã sản phẩm</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Giá gốc (VNĐ)</th>
                                            <th scope="col">Giảm giá (%)</th>
                                            <th scope="col">Tên loại</th>
                                            <th scope="col">Hiển thị</th>
                                            <th scope="col">Chi tiết</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->product_id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td><img class="img-preview" src="{{ asset('userfiles/images/products/' . $product->image) }}" width="80" height="80" alt="product_image"></td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->sale }}</td>
                                            <td>{{ $product->types->type_name }}</td>
                                            <td><span class="{{ $product->status == 0 ? 'fa fa-square-o' : 'fa fa-check-square-o'}} w-30"></span></td>
                                            <td><a data-url="{{ route('admin.detail.products', ['id' => $product->product_id]) }}" class="detail-btn" data-toggle="tooltip" data-placement="top" title="detail"><i class="fa fa-eye color-muted m-r-5"></i> </a></td>
                                            <td><span>
                                                <a href="{{ route('admin.edit.products', ['id' => $product->product_id]) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                <a href="javascript:void(0)" class="delete-btn" data-delete-url="{{ route('admin.delete.products', ['id' => $product->product_id]) }}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @include('admin.pagination.index', ['paginator' => $products])
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