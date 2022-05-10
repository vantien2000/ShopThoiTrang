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
<p>{{ $product->product_name }}</p>
<div class="price"><span class="new_price">{{ number_format(price_sale($product->price, $product->sale), 0, ',', '.') }} <sup>vnđ</sup></span>
    @if ($product->sale > 0)
    <span class="old_price">{{ number_format($product->price, 0, ',', '.') }} <sup>vnđ</sup></span>
    @endif
</div>
<div class="btn-product">
    <a href="javascript:void(0)" data-product-id="{{ $product->product_id }}" data-quantity="1" data-size="{{ $product->size }}" class="btn btn-add-cart col-sm-6 bg-info"><i class="fa fa-shopping-cart"></i>Đặt hàng</a>
    <a href="" class="btn col-sm-6 bg-warning"><i class="fa fa-eye"></i>Xem Nhanh</a>
</div>