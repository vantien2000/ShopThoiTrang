@php
    $one_product_cate = isset($newProducts->toArray()[0]) ? $newProducts->toArray()[0] : 0
@endphp
<div class="middle d-flex justify-content-between align-items-center">
    <div class="middle-left">
        @if (!empty($one_product_cate))
        <img src="{{ asset('userfiles/images/products/' . $one_product_cate['image']) }}" alt="">
        @endif
    </div>
    <div class="middle-right shadow-sm">
        <div class="menu d-flex justify-content-between align-items-center">
            <h5 class="title-middle">SẢN PHẨM THEO DANH MỤC</h5>
            <nav class="nav menu-category">
                <a class="nav-link active" href="#">Nam</a>
                <a class="nav-link" href="#">Nữ</a>
                <a class="nav-link" href="#">Hot</a>
            </nav>
        </div>
        <div class="product-category">
            @foreach ($newProducts as $key => $product)
            <div class="product {{ $key > 1 ? 'd-none' : '' }}">
                @include('users.layouts.product', $product)
            </div>
            @endforeach
        </div>
        <div class="btn-slider text-center">
            <a href="javascript:void(0)" class="btn-prev-middle mr-2">Trước</a>
            <a href="javascript:void(0)" class="btn-next-middle">Sau</a>
        </div>
    </div>
</div>