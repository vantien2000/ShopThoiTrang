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
                            <form action="" method="GET">
                                @csrf
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3>Thêm sản phẩm</h3>
                                    <div class="btn-form">
                                        <a class="btn btn-primary submit w-10">Back</a>
                                        <button class="btn btn-primary submit w-10">Cencer</button>
                                        <button class="btn btn-primary submit w-10">Filter</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="product_name">Tên sản phẩm (<span class="text-danger">*</span>)</label>
                                            <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" placeholder="Tên sản phẩm">
                                        </div>
                                        <div class="form-group">
                                            <label for="type_id">Tên Loại</label>
                                            <select name="type_id" class="form-control">
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 form-group">
                                                <label for="price">Giá (<span class="text-danger">*</span>)</label>
                                                <input type="text" value="{{ old('product_name') }}" name="price" class="form-control" placeholder="Giá sản phẩm">
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label for="sale">Sale (<span class="text-danger">*</span>)</label>
                                                <input type="text" class="form-control" name="sale" placeholder="Giảm giá">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name">Mô tả</label>
                                            <textarea name=text id="test" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6 form-group">
                                                <label for="color">Màu sắc (<span class="text-danger">*</span>)</label>
                                                <input type="text" class="form-control" name="color" placeholder="Màu sắc">
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label for="size">Kích thước (<span class="text-danger">*</span>)</label>
                                                <input type="text" class="form-control" name="size" placeholder="Kích thước">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 form-group">
                                                <label for="image">Hình ảnh (<span class="text-danger">*</span>)</label>
                                                <input type="file" class="form-control" name="image" placeholder="Hình Ảnh" multiple>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label for="quantity">Số lượng</label>
                                                <input type="text" class="form-control" name="quantity" placeholder="Số lượng">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="add_info">Thông tin thêm</label>
                                            <textarea name="add_info" cols="30" rows="5"></textarea>
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
