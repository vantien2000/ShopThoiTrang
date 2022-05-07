<div class="top">
    <nav class="navbar navbar-expand-lg d-flex justify-content-center m-auto">
        <ul class="navbar-nav top-navbar">
            <li class="nav-item new_link active">
                <a class="nav-link" href="javascript:void(0)">NEW </a>
            </li>
            <li class="nav-item sale_link">
                <a class="nav-link" href="javascript:void(0)">SALE</a>
            </li>
            <li class="nav-item rate_link">
                <a class="nav-link" href="javascript:void(0)">TOP RATE</a>
            </li>
        </ul>
    </nav>
    <div class="product-wrapper new_product_top">
        @foreach ($newProducts as $product)
        <div class="product ">
            @include('users.layouts.product', $product)
        </div>
        @endforeach
    </div>
    <div class="product-wrapper sale_product_top d-none">
        @foreach ($saleProducts as $product)
        <div class="product">
            @include('users.layouts.product', $product)
        </div>
        @endforeach
    </div>
    <div class="product-wrapper rate_product_top d-none">
        @foreach ($rateProducts as $product)
        <div class="product">
            @include('users.layouts.product', $product)
        </div>
        @endforeach
    </div>
</div>