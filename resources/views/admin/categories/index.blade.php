@extends('admin.layouts.master')
@section('content')
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @include('admin.links.index')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="form-cate" action="{{ route('admin.category.add') }}" method="POST">
                                @csrf
                                <h3 class="mb-3 cate-title">Thêm danh mục</h3>
                                <div class="form-group">
                                    <label for="category_name">Tên danh mục (<span class="text-danger">*</span>)</label>
                                    <input name="category_name" value="{{ old('category_name') }}" id="category_name" class="form-control" type="text" placeholder="Tên Danh Mục">
                                    {!! $errors->first('category_name','<span class="text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <input class="switch-toggle" name="status" id="status" type="checkbox" value="1">
                                    <label class="switch-btn" for="status"></label>
                                    {!! $errors->first('mgs','<span class="text-danger">' . $errors->first('mgs') . '</span>') !!}
                                </div>
                                <button class="btn sbm-cate btn-primary submit w-10">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.categories.filter') }}" method="GET">
                                @csrf
                                <h3 class="mb-3">Lọc/Tìm Kiếm</h3>
                                <div class="form-group">
                                    <label for="category_name">Tên danh mục</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Keyword">
                                </div>
                                <div class="form-group m-0 d-flex justify-content-between align-items-center">
                                    <div class="col-ms-6">
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="mb-0 mr-3">Hiển thị: </label>
                                            <input class="m-1 d-block" name="status" {{ Request::input('status') == 0 ? 'checked' : '' }} type="radio" value="0"><span class="mx-1">Ẩn</span>
                                            <input class="m-1 d-block" name="status" {{ Request::input('status') == 1 ? 'checked' : '' }} type="radio" value="1"><span class="mx-1">Hiện</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="mr-3">Sắp xếp: </label>
                                            <input type="checkbox" class="btn-sort-num" hidden id="sort_name" name="sort_num" value="1">
                                            <label for="sort_name" class="btn btn-info label-sort-num fa fa-sort-numeric-asc"></label>
                                            <input type="checkbox" class="btn-sort-alpha" hidden id="sort_alpha" name="sort_alpha" value="1">
                                            <label for="sort_alpha" class="btn btn-info label-sort-alpha fa fa-sort-alpha-asc"></label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary submit w-10">Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-categiories">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã danh mục</th>
                                            <th scope="col">Tên Danh Mục</th>
                                            <th scope="col">Hiển thị</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $cate)
                                        <tr>
                                            <td>{{ $cate->category_id }}</td>
                                            <td>{{ $cate->category_name }}</td>
                                            <td>
                                                <span class="{{ $cate->status == 0 ? 'fa fa-square-o' : 'fa fa-check-square-o'}} w-30"></span>
                                            </td>
                                            <td><span>
                                                <a href="javascript:void(0)" class="edit-btn" data-cate-name="{{ $cate->category_name }}" data-edit-url="{{ route('admin.category.edit',['id' => $cate->category_id]) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                <a href="javascript:void(0)" class="delete-btn" data-delete-url="{{ route('admin.category.delete',['id' => $cate->category_id]) }}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @include('admin.pagination.index', ['paginator' => $categories])
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