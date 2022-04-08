<div class="header">
    <div class="header-top">
        <div class="header-left">
            <span><i class="fa fa-envelope-o icon-header-infor"></i>EMAIL: <a class="link-infor" href="">vantienn740@gmail.com</a></span>
            <span class="ml-1"><i class="fa fa-mobile icon-header-infor"></i>PHONE: <a class="link-infor" href="">+0377528370</a></span>
        </div>
        <div class="header-right">
            <span><a class="link-infor mr-2" href="">About Us</a></span>
            <span><a class="link-infor mr-2" href="">Contact</a></span>
            <span><i class="fa fa-user-o icon-header-infor"></i><a class="link-infor" href="">Login</a></span>
        </div>
    </div>
    <div class="header-bottom">
        <div class="logo-header">
            <a href=""><img src="https://incucdep.com/wp-content/uploads/2014/12/logo-thoi-trang.jpg" width="100" alt=""></a>
        </div>
        <div class="navbar">
            <ul class="navbar-header">
                <li><a href="">HOME </a></li>
                <li class="menu-active">
                    <a href="">NAM <i class="fa fa-chevron-down"></i></a>
                    <div class="menu-level">
                        @foreach ($categories as $category)
                            <div class="menu-category-header">
                                <a class="text-dark f-bolder" href="http://">{{ $category->category_name }}</a>
                                @foreach ($category->types as $type)
                                    <a href="http://">{{ $type->type_name }}</a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </li>
                <li><a href="">NỮ <i class="fa fa-chevron-down"></i></a>
                    <div class="menu-level">
                        <div class="menu-category-header">
                            <a class="text-dark f-bolder" href="http://">S</a>
                            <a href="http://">BC</a>
                            <a href="http://">DE</a>
                            <a href="http://">RFG</a>
                        </div>
                        <div class="menu-category-header">
                            <a class="text-dark f-bolder" href="http://">A</a>
                            <a href="http://">B</a>
                            <a href="http://">C</a>
                            <a href="http://">D</a>
                        </div>
                        <div class="menu-category-header">
                            <a class="cate-title" href="http://"></a>
                            <a href="http://"></a>
                            <a href="http://"></a>
                            <a href="http://"></a>
                        </div>
                    </div>
                </li>
                <li><a href="">HOT <i class="fa fa-chevron-down"></i></a></li>
                <li><a href="">NEW <i class="fa fa-chevron-down"></i></a></li>
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
                <a href=""><img src="https://media.istockphoto.com/vectors/shopping-cart-icon-shopping-cart-illustration-for-web-mobile-apps-vector-id1225957022?k=20&m=1225957022&s=170667a&w=0&h=DKKbXdb2DfEQl3OWmIcBk0a-OHQw0rWBhSCQ-qzE_uw=" width="50" alt=""></a>
                <span class="cart-count">2</span>
            </div>
        </div>
    </div>
</div>