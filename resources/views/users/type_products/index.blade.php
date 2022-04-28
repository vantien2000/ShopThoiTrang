@extends('users.layouts.master')
@section('content')
@include('users.layouts.pageLink')
<div class="main-container page-category-product">
    <div class="category-wrapper">
        <div class="category-top d-flex align-items-center justify-content-between">
            <div class="category-top-title d-flex align-items-center"><h4 class="f-bolder m-0 mr-3">{{ $type->type_name }}</h4 ><span>({{ $productsByTypeId->count() }} sản phẩm)</span></div>
            <div class="sort-category d-flex align-items-center mr-3">
                <form id="category_filter_sort" action="{{ route('users.type.filter', ['id' => $type->type_id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="type_category" value="type"/>
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
                <form id="category_filter" action="{{ route('users.type.filter', ['id' => $type->type_id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="type_category" value="type"/>
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
                    <div class="price-range d-block">
                        @foreach (config('setup.price_filter') as $key => $price)
                        <div class="price-filter">
                            <input type="radio" value="{{ $key }}" id="price-{{ $key }}" name="price_filter">
                            <label for="price-{{ $key }}">{!! format_price_filter($price) !!}</label>
                        </div>
                        @endforeach
                    </div>
                </form>
            </div>
            @if (!isset($productsByTypeId) || !empty($productsByTypeId))
            <div class="category-product-right">
                <div class="product-wrapper-category">
                    @foreach ($productsByTypeId as $product)
                    <div class="product">
                        @include('users.layouts.product', $product)
                    </div>
                    @endforeach
                </div>
                @include('users.pagination.index', ['paginator' => $productsByTypeId])
            </div>
            @else
                <p class="f-bolder">Không có sản phẩm!!!</p>
            @endif
        </div>
    </div>
</div>
@endsection