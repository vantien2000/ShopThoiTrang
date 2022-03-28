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
                    <div class="cate-form-add d-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="card-title m-2">Create Categories</h4>
                                    <span><i class="fa fa-close close-cate-form w-10"></i></span>
                                </div>
                                <form id="form-cate-add" action="{{ route('admin.category.add') }}" method="POST">
                                    <div class="form-group">
                                        <input name="category_name" class="form-control category-name-input" type="text" placeholder="Category Name">
                                        <span class="d-block error-message text-danger"></span>
                                    </div>
                                    <button class="btn btn-primary submit">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="cate-form-edit d-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="card-title m-2">Edit Categories</h4>
                                    <span><i class="fa fa-close close-cate-form w-10"></i></span>
                                </div>
                                <form id="form-cate-edit" action="" method="POST">
                                    <div class="form-group">
                                        <input name="category_name" class="form-control category-name-input" type="text" placeholder="Category Name">
                                        <span class="d-block error-message text-danger"></span>
                                    </div>
                                    <button class="btn btn-primary submit">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="card-title m-2">Categories Table</h4>
                                    <button class="btn btn-primary cate-add-btn">Add</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-data-cate">
                                            @foreach ($categories as $cate)
                                            <tr class="category-{{ $cate->category_id }}">
                                                <td>{{ $cate->category_id }}</td>
                                                <td>{{ $cate->category_name }}</td>
                                                <td><span>
                                                    <a href="javascript:void(0)" data-category-id="{{ $cate->category_id }}" class="edit-btn" data-edit-url="{{ route('admin.category.edit',['id' => $cate->category_id]) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                    <a href="javascript:void(0)" data-category-id="{{ $cate->category_id }}" class="delete-btn" data-delete-url="{{ route('admin.category.delete',['id' => $cate->category_id]) }}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="type-form-add d-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="card-title m-2">Create Types</h4>
                                    <span><i class="fa fa-close close-type-form w-10"></i></span>
                                </div>
                                <form id="form-type-add" action="{{ route('admin.type.add') }}" method="POST">
                                    <div class="form-group">
                                        <input name="type_name" class="form-control" type="text" placeholder="Type Name">
                                        <span class="d-block error-message text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="category_id">
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-primary submit">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="type-form-edit d-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="card-title m-2">Edit Types</h4>
                                    <span><i class="fa fa-close close-type-form w-10"></i></span>
                                </div>
                                <form id="form-type-edit" action="" method="POST">
                                    <div class="form-group">
                                        <input name="type_name" class="form-control" type="text" placeholder="Type Name">
                                        <span class="d-block error-message text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="category_id" id="">
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-primary submit">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="card-title m-2">Types Table</h4>
                                    <button class="btn btn-primary type-add-btn">Add</button>
                                </div>
                                <div class="table-responsive"> 
                                    <table class="table table-bordered table-striped verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Type Name</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-data-type">
                                            @foreach ($types as $type)
                                            <tr class="type-{{ $type->type_id }}">
                                                <td>{{ $type->type_id }}</td>
                                                <td>{{ $type->type_name }}</td>
                                                <td>{{ $type->categories->category_name }}</td>
                                                <td><span>
                                                    <a href="javascript:void(0)" data-type-id="{{ $type->type_id }}" class="edit-btn" data-edit-url="{{ route('admin.type.edit',['id' => $type->type_id]) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                    <a href="javascript:void(0)" data-type-id="{{ $type->type_id }}" class="delete-btn" data-delete-url="{{ route('admin.type.delete',['id' => $type->type_id]) }}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                                </td>
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
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection