<div class="recommend-product">
    <h4 class="f-bolder text-center mx-3">CÓ THỂ BẠN SẼ THÍCH</h4>
    <div class="product-wrapper">
        @foreach ($newProducts as $key => $product)
            <div class="product">
                @include('users.layouts.product', $product)
            </div>
        @endforeach
    </div>
</div