<h4 class="title-rating f-bolder text-center">ĐÁNH GIÁ SẢN PHẨM</h4>
@if (Auth::check())
    @php
        $user = Auth::user();
    @endphp
    <div class="rating-container">
        <div class="customer-rating d-flex justify-content-center align-items-center">
            <div class="customer mr-5">
                <img src="{{ asset('userfiles/images/users/' . $user->avatar) }}"
                width="100" height="100" alt="">
                <p class="f-bolder m-0 text-center">{{ $user->user_name }}</p>
            </div>
            <div class="form-rating">
                <form id="form-review" action="{{ route('users.post.review') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
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
                        <textarea name="review_content" id="" cols="100" rows="1"></textarea>
                    </div>
                    <button class="btn btn-info">Đánh giá</button>
                </form>
            </div>
        </div>
    </div>
@endif
<div class="rating-list mt-3">
    @foreach ($reviews as $review)
        <div class="rating-ele d-flex mb-3">
            <div class="rating-left">
                <img class="d-block" src="{{ asset('userfiles/images/users/' . $review->avatar ) }}" alt="customer" width="60" height="60">
                <div class="customer-rate mr-2">
                    <div class="fill-ratings" style="width: {{ $review->rate * 100/5 }}%;">
                        <span>★★★★★</span>
                    </div>
                    <div class="empty-ratings">
                        <span>★★★★★</span>
                    </div>
                </div>
            </div>
            <div class="comment">
                <p class="m-0 f-bolder">{{ $review->user_name }}</p>
                <p class="m-0">{{ $review->review_content }}</p>
                <p class="time-create text-left m-0">{{ date("h:i d/m/y", strtotime($review->created_at)) }}</p>
            </div>
        </div> 
    @endforeach
</div>