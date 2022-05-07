<!--**********************************
    Sidebar start
***********************************-->
<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="{{ route('admin.home') }}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Users</li>
            <li>
                <a href="{{ route('admin.users') }}" aria-expanded="false">
                    <i class="icon-user menu-icon"></i> <span class="nav-text">Người dùng</span>
                </a>
            </li>
            <li class="nav-label">Catgories And Types</li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="icon-list menu-icon"></i> <span class="nav-text">Danh Mục</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.categories') }}">Danh Mục</a></li>
                    <li><a href="{{ route('admin.types') }}">Loại</a></li>
                </ul>
            </li>
            <li class="nav-label">Products</li>
            <li>
                <a href="{{ route('admin.products') }}" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i> <span class="nav-text">Sản phẩm</span>
                </a>
            </li>
            <li class="nav-label">Reviews</li>
            <li>
                <a href="{{ route('admin.reviews') }}" aria-expanded="false">
                    <i class="icon-star menu-icon"></i> <span class="nav-text">Đánh Giá</span>
                </a>
            </li>
            <li class="nav-label">Invoices</li>
            <li>
                <a href="{{ route('admin.invoices') }}" aria-expanded="false">
                    <i class="icon-handbag menu-icon"></i> <span class="nav-text">Hóa đơn</span>
                </a>
            </li>
            <li class="nav-label">statistic</li>
            <li>
                <a href="{{ route('admin.statistic') }}" aria-expanded="false">
                    <i class="icon-chart menu-icon"></i> <span class="nav-text">Thống kê</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
