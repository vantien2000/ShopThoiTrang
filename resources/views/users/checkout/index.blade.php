@php
    $user = Auth::user();
@endphp
<div id="checkout" class="customer_checkout mt-5">
    <form id="order_custom" action="{{ route('users.post.checkout') }}" class="order_custom row" method="post">
        @csrf
        <div class="col-lg-6 col-sm-6">
            <h5 class="f-bolder {{ Auth::check() ? 'mb-3' : ''}}">THÔNG TIN KHÁCH HÀNG</h5>
            @if(!Auth::check())
                <div class="link_to_login d-flex align-items-center mb-3"><i class="fa fa-user-o mr-2"></i><a class="d-block" href="">Đăng nhập nếu là thành viên ></a></div>
            @endif
            <div class="form-group mr-1">
                <input type="text" class="form-control" value="{{ Auth::check() ? $user->email : old("email") }}" name="email" id="email" placeholder="Email (*)">
                {!! $errors->first('email','<span class="d-block text-danger">:message</span>') !!}
            </div>
            <div class="form-group mr-1">
                <input type="text" class="form-control" name="phone_number" value="{{ Auth::check() ? $user->phone_number : old("phone_number") }}" id="phone_number" placeholder="Số Điện Thoại (*)">
                {!! $errors->first('phone_number','<span class="d-block text-danger">:message</span>') !!}
            </div>
            <div class="form-group mr-1">
                <select class="form-control" name="provinces" id="provinces">
                    <option hidden value="">Tỉnh Thành (*)</option>
                    @foreach ($provinces as $key => $province)
                        <option value="{{ $key }}">{{ $province }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mr-1">
                <select class="form-control" name="districts" id="districts"> </select>
            </div>
            <div class="form-group mr-1">
                <select class="form-control" name="wards" id="wards"></select>
            </div>
            <div class="form-group mr-1">
                <input type="text" class="form-control" name="home_number" value="{{ old("home_number") }}" id="home_number" placeholder="Số Nhà/Thôn Xóm (*)">
                {!! $errors->first('home_number','<span class="d-block text-danger">:message</span>') !!}
            </div>
            <div class="form-group mr-1">
                <textarea class="form-control" name="comment" id="comment" cols="25" rows="5" placeholder="Ghi chú"></textarea>
                {!! $errors->first('comment','<span class="d-block text-danger">:message</span>') !!}
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 p-0 order-right checkout_element">
            <div class="payment_method">
                <h5 class="f-bolder">PHƯƠNG THỨC THANH TOÁN</h5>
                <div class="form-wrapper">
                    <div class="payment">
                        <input type="radio" name="pay" id="pay" checked value="{{ PAY_COD }}">
                        <label for="pay">Thanh toán khi nhận hàng (COD)</label>
                        <div class="more_comment">
                            <p>Cảm ơn quý khách đã mua sắm tại {{ route('users.home') }}</p>
                        </div>
                    </div>
                    <div class="banking">
                        <input type="radio" name="pay" id="pay" value="{{ BANKING }}">
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
                    <button type="submit" class="btn_payment">ĐẶT HÀNG</button>
                </div>
            </div>
        </div>
    </form>
</div>