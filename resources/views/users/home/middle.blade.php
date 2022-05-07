@php
    $productCategoryTypeFemaleFirst = isset($productCategoryTypeFemale->toArray()[0]) ? $productCategoryTypeFemale->toArray()[0] : 0;
    $productCategoryTypeMaleFirst = isset($productCategoryTypeMale->toArray()[0]) ? $productCategoryTypeMale->toArray()[0] : 0;
@endphp
<div class="middle d-flex justify-content-between align-items-center">
    <div class="middle-left female_image_first d-none">
    @if (!empty($productCategoryTypeFemaleFirst))
        <img src="{{ asset('userfiles/images/products/' . $productCategoryTypeFemaleFirst['image']) }}" alt="">
    @endif
    </div>
    <div class="middle-left male_image_first">
    @if (!empty($productCategoryTypeMaleFirst))
        <img src="{{ asset('userfiles/images/products/' . $productCategoryTypeMaleFirst['image']) }}" alt="">
    @endif
    </div>
    <div class="middle-right shadow-sm">
        <div class="menu d-flex justify-content-between align-items-center">
            <h5 class="title-middle">SẢN PHẨM THEO DANH MỤC</h5>
            <nav class="nav menu-category">
                <a class="nav-link male_link active" href="javascript:void(0)">Nam</a>
                <a class="nav-link female_link" href="javascript:void(0)">Nữ</a>
            </nav>
        </div>
        <div class="product-category female_category_products d-none">
            @foreach ($productCategoryTypeFemale as $key => $product)
            <div class="product {{ $key > 1 ? 'd-none' : '' }}">
                @include('users.layouts.product', $product)
            </div>
            @endforeach
        </div>
        <div class="product-category male_category_products">
            @foreach ($productCategoryTypeMale as $key => $product)
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