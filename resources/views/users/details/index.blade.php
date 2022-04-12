@extends('users.layouts.master')
@section('content')
    <div class="main-container page-detail">
        <div class="container-wwrapper">
            @include('users.layouts.pageLink')
            <div class="detail-product">
                <div class="row">
                    <div class="detail-left col-lg-6">
                        <img id="image_zoom" src="{{ asset('/userfiles//images/products/' . $product->image) }}" width="100%" height="494px" alt="">
                    </div>
                    <div class="detail-right col-lg-6">
                        <p class="product-name">{{ $product->product_name }}</p>
                        <div class="product-rate d-flex">
                            <div class="product-key mr-3">
                                ID: {{ $product->product_id }}
                            </div>
                            <div class="product-rate mr-2">
                                <div class="fill-ratings" style="width: 50%;">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                            (đánh giá)
                        </div>
                        <div class="description">
                            {!! $product->description !!}
                        </div>
                        <div class="price"><span class="new_price">{{ number_format(price_sale($product->price, $product->sale), 0, ',', '.') }} <sup>vnđ</sup></span><span class="old_price">{{ number_format($product->price, 0, ',', '.') }} <sup>vnđ</sup></span></div>
                        <div class="sale">
                            Tiết kiệm: {{  number_format(($product->price * $product->sale / 100), 0, ',', '.') }} <sup>vnđ</sup><span class="product-sale">-{{ $product->sale }}%</span>
                        </div>
                        <hr>
                        <form action="">
                            <div class="choose">
                                <div class="title-size f-bolder">
                                    Kích Thước
                                </div>
                                <div class="sizes d-flex">
                                    @foreach (config('setup.sizes') as $size)
                                    <div class="size-element">
                                        <label class="size-{{ $size }}" for="size-{{ $size }}">{{ $size }}</label>
                                        <input type="radio" id="size-{{ $size }}" name="size" value="{{ $size }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="quantity f-bolder">
                                Số lượng: <input name="quantity" class="quantity-product d-inline-block" width="30px" value="{{ $product->quantity }}" type="number" min="0" max="{{ $product->quantity }}">
                            </div>
                            <div class="add-to-cart">
                                <button type="submit" class="btn btn-dark">THÊM VÀO GIỎ HÀNG</button>
                            </div>
                        </form>
                        <div class="add-information mt-3">
                            <span class="f-bolder mb-3">Thông tin thêm </span><i class="fa fa-plus ml-3" aria-hidden="true"></i>
                            <p class="additional-information d-block">
                                {!! $product->add_infor !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rating-container">
                <h4 class="title-rating f-bolder text-center">ĐÁNH GIÁ SẢN PHẨM</h4>
                <div class="customer-rating d-flex justify-content-center align-items-center">
                    <div class="customer mr-5">
                        <img src="https://ict-imgs.vgcloud.vn/2020/09/01/19/huong-dan-tao-facebook-avatar.jpg"
                        width="100" height="100" alt="">
                        <p class="f-bolder m-0 text-center">Username</p>
                    </div>
                    <div class="form-rating">
                        <form action="">
                            <div class="rate p-0">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                            <div class="form-group mb-2">
                                <textarea name="" id="" cols="100" rows="1"></textarea>
                            </div>
                            <button class="btn btn-info">Đánh giá</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="rating-list mt-5">
                <div class="rating-ele d-flex mb-3">
                    <div class="rating-left">
                        <img class="d-block" src="" alt="" width="60" height="60">
                        <div class="customer-rate mr-2">
                            <div class="fill-ratings" style="width: 50%;">
                                <span>★★★★★</span>
                            </div>
                            <div class="empty-ratings">
                                <span>★★★★★</span>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, perferendis. Et consequuntur similique excepturi odio modi dignissimos tenetur fugiat reiciendis veritatis velit nesciunt deleniti eum quae harum, aspernatur numquam soluta.</p>
                    </div>
                </div>
                <div class="rating-ele d-flex mb-3">
                    <div class="rating-left">
                        <img class="d-block" src="" alt="" width="60" height="60">
                        <div class="customer-rate mr-2">
                            <div class="fill-ratings" style="width: 50%;">
                                <span>★★★★★</span>
                            </div>
                            <div class="empty-ratings">
                                <span>★★★★★</span>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, perferendis. Et consequuntur similique excepturi odio modi dignissimos tenetur fugiat reiciendis veritatis velit nesciunt deleniti eum quae harum, aspernatur numquam soluta.</p>
                    </div>
                </div>
                <div class="rating-ele d-flex mb-3">
                    <div class="rating-left">
                        <img class="d-block" src="" alt="" width="60" height="60">
                        <div class="customer-rate mr-2">
                            <div class="fill-ratings" style="width: 50%;">
                                <span>★★★★★</span>
                            </div>
                            <div class="empty-ratings">
                                <span>★★★★★</span>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, perferendis. Et consequuntur similique excepturi odio modi dignissimos tenetur fugiat reiciendis veritatis velit nesciunt deleniti eum quae harum, aspernatur numquam soluta.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop