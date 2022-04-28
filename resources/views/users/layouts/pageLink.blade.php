@php
    $currentRoute = Request::route()->getName();
@endphp
<div class="page-to-page">
    <ul class="d-flex m-0">
        @if ($currentRoute == 'users.detail')
        <li class="pr-2">Trang chủ </li>
        <li class="pr-2 pl-2 link"><a href="{{ route('users.category.product', ['id' => $product->types->categories->category_id]) }}">{{ $product->types->categories->category_name }}</a></li>
        <li class="pr-2 pl-2 link"><a href="">{{ $product->types->type_name }}</a></li>
        <li class="pr-2 pl-2 link"> {{ $product->product_name }}</li>
        @endif
        @if ($currentRoute == 'users.cart')
        <li class="pr-2">Trang chủ </li>
        <li class="pr-2 pl-2 link"> Giỏ Hàng</li>
        @endif
        @if ($currentRoute == 'users.category.product')
        <li class="pr-2">Trang chủ </li>
        <li class="pr-2 pl-2 link">Danh mục </li>
        <li class="pr-2 pl-2 link">{{ $category->category_name }}</a></li>
        @endif
        @if ($currentRoute == 'users.type.product')
        <li class="pr-2">Trang chủ </li>
        <li class="pr-2 pl-2 link">Danh mục </li>
        <li class="pr-2 pl-2 link"><a href="{{ route('users.category.product', ['id' => $type->categories->category_id]) }}">{{ $type->categories->category_name }}</a></li>
        <li class="pr-2 pl-2 link"><a href="{{ route('users.type.product', ['id' => $type->type_id]) }}">{{ $type->type_name }}</a></li>
        @endif
    </ul>
</div>