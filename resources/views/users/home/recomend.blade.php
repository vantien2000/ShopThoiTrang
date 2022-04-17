<div class="recommend-product">
    <h4 class="f-bolder text-center mx-3">CÓ THỂ BẠN SẼ THÍCH</h4>
    <div class="product-wrapper">
        @foreach ($newProducts as $key => $product)
            <div class="product">
                <a class="product_image" href="{{ route('users.detail', ['id' => $product->product_id]) }}">
                    <img src="{{ asset('userfiles/images/products/' . $product->image) }}" width="100%" height="300px" alt="">
                    @if ($product->sale > 0)
                    <span class="icon-new bg-sale">{{ $product->sale }}%</span> 
                    @else
                    <span class="icon-new bg-new">New</span>
                    @endif
                </a>
                <div class="star-ratings">
                    <div class="fill-ratings" style="width: {{ $product->rate * 100 / 5 }}%;">
                    <span>★★★★★</span>
                    </div>
                    <div class="empty-ratings">
                    <span>★★★★★</span>
                    </div>
                </div>
                <p class="m-0">{{ $product->product_name }}</p>
                <div class="price"><span class="new_price">{{ number_format(price_sale($product->price, $product->sale), 0, ',', '.') }} <sup>vnđ</sup></span><span class="old_price">{{ number_format($product->price, 0, ',', '.') }} <sup>vnđ</sup></span></div>
                <div class="btn-product">
                    <a href="javascript:void(0)" data-product-id="{{ $product->product_id }}" data-quantity="1" class="btn btn-add-cart col-sm-6 bg-info"><i class="fa fa-shopping-cart"></i>Đặt hàng</a>
                    <a href="" class="btn col-sm-6 bg-warning"><i class="fa fa-eye"></i>Xem Nhanh</a>
                </div>
            </div>
        @endforeach
    </div>
</div