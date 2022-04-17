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
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-reviews">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã đánh giá</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Người đánh giá</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ $review->review_id }}</td>
                                            <td>{{ $review->products->product_name }}</td>
                                            <td>{{ $review->users->user_name }}</td>
                                            <td>{{ $review->review_content }}</td>
                                            <td><span>
                                                <a href="javascript:void(0)" class="delete-btn" data-delete-url="{{ route('admin.delete.reviews', ['id' => $review->review_id]) }}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @include('admin.pagination.index', ['paginator' => $reviews])
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