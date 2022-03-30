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
                                <h3 class="mb-3">Thêm sản phẩm</h3>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="category_name">Tên sản phẩm</label>
                                            <input type="text" class="form-control" name="category_name" placeholder="Keyword">
                                        </div>
                                        <div class="form-group m-0 d-flex justify-content-between align-items-center">
                                            <div class="col-ms-6">
                                                <div class="form-group d-flex align-items-center justify-content-between">
                                                    <label class="mb-0 mr-3">Hiển thị: </label>
                                                    <input class="m-1 d-block" name="status" checked type="radio" value="0"><span class="mx-1">Ẩn</span>
                                                    <input class="m-1 d-block" name="status" type="radio" value="1"><span class="mx-1">Hiện</span>
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
                                    </div>
                                </div>
                                
                                
                                <button class="btn btn-primary submit w-10">Filter</button>
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