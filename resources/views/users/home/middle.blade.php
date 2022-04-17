@php
    $one_product_cate = $newProducts->toArray()[0]
@endphp
<div class="middle d-flex justify-content-between align-items-center">
    <div class="middle-left">
        <img src="{{ asset('userfiles/images/products/' . $one_product_cate['image']) }}" alt="">
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
            <div class="product {{ $key > 2 ? 'd-none' : '' }}">
                <a class="product_image" href="{{ route('users.detail', ['id' => $product->product_id]) }}">
                    <img src="{{ asset('userfiles/images/products/' . $product->image) }}" width="200" height="250" alt="">
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
        <div class="btn-slider text-center">
            <a href="javascript:void(0)" class="btn-prev-middle mr-2">Trước</a>
            <a href="javascript:void(0)" class="btn-next-middle">Sau</a>
        </div>
    </div>
</div>