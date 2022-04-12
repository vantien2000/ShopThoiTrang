<div class="top">
    <nav class="navbar navbar-expand-lg d-flex justify-content-center m-auto">
        <ul class="navbar-nav top-navbar">
            <li class="nav-item active">
                <a class="nav-link" href="#">NEW </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">SALE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">TOP RATE</a>
            </li>
        </ul>
    </nav>
    <div class="product-wrapper">
        @foreach ($newProducts as $product)
        <div class="product">
            <a class="product_image" href="{{ route('users.detail', ['id' => $product->product_id]) }}">
                <img src="{{ asset('userfiles/images/products/' . $product->image) }}" width="200" height="250" alt="">
                @if ($product->sale > 0)
                <span class="icon-new bg-sale">{{ $product->sale }}%</span> 
                @else
                <span class="icon-new bg-new">New</span>
                @endif
            </a>
            <div class="star-ratings">
                <div class="fill-ratings" style="width: 50%;">
                  <span>★★★★★</span>
                </div>
                <div class="empty-ratings">
                  <span>★★★★★</span>
                </div>
            </div>
            <p class="m-0">{{ $product->product_name }}</p>
            <div class="price"><span class="new_price">{{ number_format(price_sale($product->price, $product->sale), 0, ',', '.') }} <sup>vnđ</sup></span><span class="old_price">{{ number_format($product->price, 0, ',', '.') }} <sup>vnđ</sup></span></div>
            <div class="btn-product">
                <a href="" class="btn col-sm-6 bg-info"><i class="fa fa-shopping-cart"></i>Đặt hàng</a>
                <a href="" class="btn col-sm-6 bg-warning"><i class="fa fa-eye"></i>Xem Nhanh</a>
            </div>
        </div>
        @endforeach
    </div>
</div>