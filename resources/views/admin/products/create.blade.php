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
                            <form action="{{ route('admin.add.products.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3>Thêm sản phẩm</h3>
                                    <div class="btn-form">
                                        <a href="{{ route('admin.products') }}" class="text-d-none btn btn-primary w-10">Back</a>
                                        <button class="btn btn-info submit w-10">Create</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="product_name">Tên sản phẩm (<span class="text-danger">*</span>)</label>
                                            <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" placeholder="Tên sản phẩm">
                                            {!! $errors->first('product_name','<span class="text-danger">:message</span>') !!}
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
                                                <input type="text" value="{{ old('price') }}" name="price" class="form-control" placeholder="Giá sản phẩm">
                                                {!! $errors->first('price','<span class="text-danger">:message</span>') !!}
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label for="sale">Sale (<span class="text-danger">*</span>)</label>
                                                <input type="text" value="{{ old('sale') }}" class="form-control" name="sale" placeholder="Giảm giá">
                                                {!! $errors->first('sale','<span class="text-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>{!! $errors->first('description','<span class="text-danger">:message</span>') !!}
                                            <textarea name="description" id="test" cols="30" value="{{ old('description') }}" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6 form-group">
                                                <label for="size">Kích thước (<span class="text-danger">*</span>)</label>
                                                <select name="size" class="form-control">
                                                    @foreach (config('setup.sizes') as $size)
                                                        <option value="{{ $size }}">{{ $size }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <label for="quantity">Số lượng</label>
                                                <input type="text" class="form-control" value="{{ old('quantity') }}" name="quantity" placeholder="Số lượng">
                                                {!! $errors->first('quantity','<span class="text-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Chọn Hình (<span class="text-danger">*</span>)</label>
                                            <input type="file" class="form-control" name="image_upload" placeholder="Hình Ảnh" multiple>
                                            {!! $errors->first('image_upload','<span class="text-danger">:message</span>') !!}
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 form-group">
                                                <label for="image">Hình Ảnh (<span class="text-danger">*</span>)</label>
                                                <input type="text" class="form-control" value="{{ old('image') }}" name="image" placeholder="Hình Ảnh">
                                                {!! $errors->first('image','<span class="text-danger">:message</span>') !!}
                                            </div>
                                            <div class="col-lg-4 form-group">
                                                <label>Hiển thị</label>
                                                <input class="mt-2 switch-toggle" name="status" id="status" type="checkbox" value="1">
                                                <label class="switch-btn" for="status"></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="add_infor">Thông tin thêm</label>
                                            <textarea name="add_infor" id="add_infor" cols="30" value="{{ old('add_info') }}" rows="5"></textarea>
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
