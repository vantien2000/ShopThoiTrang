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
                                <table class="table table-bordered verticle-middle table-types">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã sản phẩm</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Giá gốc</th>
                                            <th scope="col">Giảm giá</th>
                                            <th scope="col">Tên loại</th>
                                            <th scope="col">Hiển thị</th>
                                            <th scope="col">Chi tiết</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($types as $type)
                                        <tr>
                                            <td>{{ $type->type_id }}</td>
                                            <td>{{ $type->type_name }}</td>
                                            <td>{{ $type->categories->category_name }}</td>
                                            <td>
                                                <span class="{{ $type->status == 0 ? 'fa fa-square-o' : 'fa fa-check-square-o'}} w-30"></span>
                                            </td>
                                            <td><span>
                                                <a href="javascript:void(0)" class="edit-btn" data-cate-id="{{ $type->categories->category_id }}" data-type-name="{{ $type->type_name }}" data-edit-url="{{ route('admin.type.edit',['id' => $type->type_id]) }}" 
                                                data-status="{{ $type->status }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                <a href="javascript:void(0)" class="delete-btn" data-delete-url="{{ route('admin.type.delete',['id' => $type->type_id]) }}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                            </td>
                                        </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                                {{-- @include('admin.pagination.index', ['paginator' => $types]) --}}
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