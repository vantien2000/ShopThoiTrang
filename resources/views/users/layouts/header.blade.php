<div class="header">
    <div class="header-top">
        <div class="header-left">
            <span><i class="fa fa-envelope-o icon-header-infor"></i>EMAIL: <a class="link-infor" href="">vantienn740@gmail.com</a></span>
            <span class="ml-1"><i class="fa fa-mobile icon-header-infor"></i>PHONE: <a class="link-infor" href="">+0377528370</a></span>
        </div>
        <div class="header-right">
            @if (Auth::check())
                <span>Xin chào {{ Auth::user()->user_name }}&nbsp;</span>
                <a class="img-avatar dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img src="{{ asset('/userfiles/images/users/' . Auth::user()->avatar) }}" width="30px" height="30px" alt="avatar">
                </a>
                <div class="dropdown-menu menu-profile" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Thông tin cá nhân</a>
                  <a class="dropdown-item" href="#">Đơn hàng</a>
                  <a class="dropdown-item" href="{{ route('users.logout') }}">Đăng xuất</a>
                </div>
            @else
            <span><i class="fa fa-user-o icon-header-infor"></i><a class="link-infor" href="{{ route('users.login') }}">LOGIN</a></span>
            @endif
        </div>
    </div>
    <div class="header-bottom">
        <div class="logo-header">
            <a href="{{ route('users.home') }}"><img src="{{ asset('/users/images/header/logo.jpg') }}" width="100" alt=""></a>
        </div>
        <div class="navbar">
            <ul class="navbar-header">
                <li><a href="{{ route('users.home') }}">HOME </a></li>
                <li class="menu-active">
                    <a href="">{{ config('setup.cates')[0] }}<i class="fa fa-chevron-down"></i></a>
                    <div class="menu-level">
                        @foreach ($categories_female as $category)
                        <div class="menu-category-header">
                            <a class="text-dark f-bolder" href="{{ route('users.category.product', ['id' => $category->category_id]) }}">{{ $category->category_name }}</a>
                            @foreach ($category->types as $type)
                                <a href="http://">{{ $type->type_name }}</a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </li>
                <li class="menu-active">
                    <a href="">{{ config('setup.cates')[1] }}<i class="fa fa-chevron-down"></i></a>
                    <div class="menu-level">
                        @foreach ($categories_male as $category)
                            <div class="menu-category-header">
                                <a class="text-dark f-bolder" href="{{ route('users.category.product', ['id' => $category->category_id]) }}">{{ $category->category_name }}</a>
                                @foreach ($category->types as $type)
                                    <a href="http://">{{ $type->type_name }}</a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </li>
                <li><a href="">ABOUT US</a></li>
                <li><a href="">CONTACT</a></li>
                <li><a href="">BLOG </a></li>
            </ul>
        </div>
        <div class="cart-header">
            <div class="search-box">
                <form action="" class="form-search-box">
                    <input type="text" class="search-input" placeholder="Search">
                    <button type="submit" class="icon-search fa fa-search"></button>
                </form>
            </div>
            <div class="cart-box">
                <a href="{{ route('users.cart') }}"><img src="{{ asset('/users/images/header/cart_icon.jpg') }}" width="50" alt=""></a>
                <span class="cart-count">{{ session('carts') ? count(session('carts')) : 0 }}</span>
            </div>  
        </div>
    </div>
</div>