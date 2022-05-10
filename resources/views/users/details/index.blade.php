@extends('users.layouts.master')
@section('content')
@include('users.layouts.pageLink')
    <div class="main-container page-detail">
        <div class="container-wrapper">
            <div class="detail-product">
                <div class="row">
                    <div class="detail-left col-lg-6">
                        <img id="image_zoom" src="{{ asset('/userfiles//images/products/' . $product->image) }}" width="100%" alt="">
                    </div>
                    <div class="detail-right col-lg-6">
                        <p class="product-name">{{ $product->product_name }}</p>
                        <div class="product-rate d-flex">
                            <div class="product-key mr-3">
                                ID: {{ $product->product_id }}
                            </div>
                            <div class="product-rate mr-2">
                                <div class="fill-ratings" style="width: {{ $product->rate * 100 / 5 }}%;">
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
                        <div class="">
                            Hiện có: {{ $product->quantity }} (sản phẩm)
                        </div>
                        <hr>
                        <form action="{{ route('users.add.cart') }}" method="POST" id="form-detail">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
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
                                Số lượng: <input name="quantity" class="quantity-product d-inline-block" width="30px" value="1" type="number" min="1" max="{{ $product->quantity }}">
                            </div>
                            <div class="add-to-cart">
                                <button type="submit" class="btn btn-dark">THÊM VÀO GIỎ HÀNG</button>
                            </div>
                        </form>
                        <div class="add-information mt-5">
                            <div class="add-infor-block d-flex align-items-center">
                                <span class="f-bolder">Thông tin thêm </span><i class="fa fa-plus ml-3 btn-addition-infor" aria-hidden="true"></i>
                            </div>
                            <div class="additional-information d-none">
                                {!! $product->add_infor !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-rating-rule d-flex justify-content-between">
                @include('users.reviews.index')
                @include('users.home.rule')
            </div>
        </div>
    </div>
    @include('users.home.recomend')
@stop