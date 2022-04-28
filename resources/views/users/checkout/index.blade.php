<div class="row customer_checkout mt-5">
    <div class="col-lg-6 col-sm-6">
        <h5 class="f-bolder">THÔNG TIN KHÁCH HÀNG</h5>
        <div class="link_to_login d-flex align-items-center"><i class="fa fa-user-o mr-2"></i><a class="d-block" href="">Đăng nhập nếu là thành viên ></a></div>
        <form id="order_custom" action="{{ route('users.post.register') }}" class="order_custom mt-4" method="POST">
            @csrf
            <div class="form-group mr-1">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email (*)">
                {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
            </div>
            <div class="form-group mr-1">
                <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Số Điện Thoại (*)">
                {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
            </div>
            <div class="form-group mr-1">
                <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ (*)">
                {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
            </div>
            <div class="form-group mr-1">
                <textarea class="form-control" name="comment" id="comment" cols="25" rows="10" placeholder="Ghi chú"></textarea>
                {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
            </div>
        </form>
    </div>
    <div class="col-lg-6 col-sm-6 p-0 order-right checkout_element">
        <div class="payment_method">
            <h5 class="f-bolder">PHƯƠNG THỨC THANH TOÁN</h5>
            <form action="">
                <div class="form-wrapper">
                <div class="payment">
                    <input type="radio" name="pay" id="pay">
                    <label for="pay">Thanh toán khi nhận hàng (COD)</label>
                    <div class="more_comment">
                        <p>Cảm ơn quý khách đã mua sắm tại {{ Request::url() }}</p>
                    </div>
                </div>
                <div class="banking">
                    <input type="radio" name="pay" id="pay">
                    <label for="pay">Thanh toán qua TÀI KHOẢN NGÂN HÀNG</label>
                    <div class="more_comment">
                        <p>Khi chuyển khoản, quý khách vui lòng nhập nội dung</p>
                        <p>chuyển khoản:</p>
                        <p class="f-boler">Mua [Tên loại sản phẩm hoặc mã số đơn hàng] - [Tên khách hàng] - [Số điện thoại]</p>
                        <p>Tên tài khoản: Phạm Công Hiển</p>
                        <p>Số tài khoản: 140114849332512</p>
                        <p>Ngân Hàng TMCP XNK (EXIMBANK) - CN. Tân Định - Tp. Hồ Chí Minh</p>
                    </div>
                </div>
            </div>
            <div class="payment-shop">
                <a href="{{ route('users.home') }}" class="btn_payment">THANH TOÁN</a>
            </div>
            </form>
        </div>
    </div>
</div>