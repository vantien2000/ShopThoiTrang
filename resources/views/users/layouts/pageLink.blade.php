@php
    $currentRoute = Request::route()->getName();
@endphp
<div class="page-to-page">
    <ul class="d-flex">
        @if ($currentRoute == 'users.detail')
        <li class="pr-2">Trang chủ </li>
        <li class="pr-2 pl-2 link"><a href="">{{ $product->types->categories->category_name }}</a></li>
        <li class="pr-2 pl-2 link"><a href="">{{ $product->types->type_name }}</a></li>
        <li class="pr-2 pl-2 link"> {{ $product->product_name }}</li>
        @endif
        
    </ul>
</div>