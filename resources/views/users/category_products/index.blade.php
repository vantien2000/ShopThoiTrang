@extends('users.layouts.master')
@section('content')
@include('users.layouts.pageLink')
<div class="main-container page-category-product">
    <div class="category-wrapper">
        <div class="category-top d-flex align-items-center justify-content-between">
            <div class="category-top-title d-flex align-items-center"><h4 class="f-bolder m-0 mr-3">{{ $category->category_name }}</h4 ><span>({{ $category->count() }} sản phẩm)</span></div>
            <div class="sort-category d-flex align-items-center mr-3">
                <form id="category_filter_sort" action="{{ route('users.category.filter', ['id' => $category->category_id]) }}" method="post">
                    @csrf
                    <label class="m-0" for="">Sắp xếp theo: </label>
                    <select name="sort_category" class="ml-2" id="sort_category">
                        @foreach (config('setup.filter_category_type') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <div class="d-flex">
            <div class="category-filter-left">
                <form id="category_filter" action="{{ route('users.category.filter', ['id' => $category->category_id]) }}" method="POST">
                    @csrf
                    <div class="size-title">
                        <div>Loại sản phẩm </div>
                    </div>
                    <div class="type-filter">
                        @foreach ($category->types as $type)
                            <div class="type-filter-element">
                                <label class="type-{{ $type->type_id }}-filter" for="type-{{ $type->type_id }}">{{ $type->type_name }}</label>
                                <input id="type-{{ $type->type_id }}" name="type_id" type="radio" value="{{ $type->type_id }}" hidden>
                            </div>
                        @endforeach
                    </div>
                    <div class="size-title">
                        <div>Kích Thước </div>
                    </div>
                    <div class="sizes-product">
                        @foreach (config('setup.sizes') as $size)
                        <div class="checkbox">
                            <label for="size">{{ $size }}</label>
                            <input type="checkbox" id="size" name="size" value="{{ $size }}">
                        </div>
                        @endforeach
                    </div>
                    <div class="size-title my-3">
                        <div>Giá </div><span></span>
                    </div>
                    <div id="rangeslider">
                    </div>
                    <div class="price-range d-flex justify-content-between">
                        <label for="min_price" class="min_price"></label>
                        <input width="30px" name="min_price" type="text" id="min_price" value="" hidden>
                        <label for="max_price" class="max_price"></label>
                        <input width="30px" name="max_price" type="text" id="max_price" value="" hidden>
                    </div>
                </form>
            </div>
            @if (!empty($productsByCategoryId))
            <div class="category-product-right">
                <div class="product-wrapper-category">
                    @foreach ($productsByCategoryId as $product)
                    <div class="product">
                        @include('users.layouts.product', $product)
                    </div>
                    @endforeach
                </div>
                @include('users.pagination.index', ['paginator' => $productsByCategoryId])
            </div>
            @else
                <p class="f-bolder">Không có sản phẩm!!!</p>
            @endif
        </div>
    </div>
</div>
@endsection