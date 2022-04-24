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
            @include('users.layouts.product', $product)
        </div>
        @endforeach
    </div>
</div>