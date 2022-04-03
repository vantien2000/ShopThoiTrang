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
                            <form id="form-type" action="{{ route('admin.type.add') }}" method="POST">
                                @csrf
                                <h3 class="mb-3 type-title">Thêm loại</h3>
                                <div class="form-group">
                                    <label for="type_name">Tên loại (<span class="text-danger">*</span>)</label>
                                    <input name="type_name" value="{{ old('type_name') }}" id="type_name" class="form-control" type="text" placeholder="Tên loại">
                                    {!! $errors->first('type_name','<span class="text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Tên danh mục</label>
                                    <select name="category_id" class="form-control" id="category_name">
                                        @foreach ($categories as $cate)
                                            <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <input class="switch-toggle" name="status" id="status" type="checkbox" value="1">
                                    <label class="switch-btn" for="status"></label>
                                    {!! $errors->first('mgs','<span class="text-danger">' . $errors->first('mgs') . '</span>') !!}
                                </div>
                                <button class="btn sbm-type btn-primary submit w-10">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.type.filter') }}" method="GET">
                                @csrf
                                <h3 class="mb-3">Lọc/Tìm Kiếm</h3>
                                <div class="form-group">
                                    <label for="category_name">Tên Loại</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Keyword">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Tên danh mục</label>
                                    <select name="category_id" class="form-control">
                                        <option value="" hidden>Tất Cả</option>
                                        @foreach ($categories as $cate)
                                            <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                        @endforeach
                                    </select>
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
                                <table class="table table-bordered verticle-middle table-types">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã danh mục</th>
                                            <th scope="col">Tên Loại</th>
                                            <th scope="col">Tên Danh Mục</th>
                                            <th scope="col">Hiển thị</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($types as $type)
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
                                        @endforeach
                                    </tbody>
                                </table>
                                @include('admin.pagination.index', ['paginator' => $types])
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