<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\ProfileRequest;
use App\Services\ListService;
use App\Services\ProductService;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $list, $products, $profileService;
    public function __construct(ListService $list, ProductService $products, ProfileService $profileService)
    {
        $this->list = $list;
        $this->products = $products;
        $this->profileService = $profileService;
    }
    public function index() {
        $categories_male = $this->list->showCateUsers(STATUS_ON);
        $categories_female = $this->list->showCateUsers(STATUS_OFF);
        $productCategoryTypeMale = $this->products->productCategoryType(STATUS_ON);
        $productCategoryTypeFemale = $this->products->productCategoryType(STATUS_OFF);
        $newProducts = $this->products->newProducts();
        $saleProducts = $this->products->saleProducts();
        $rateProducts = $this->products->rateProducts();
        return view('users.home.index',compact('categories_male', 'categories_female', 
        'newProducts', 'saleProducts', 'rateProducts', 'productCategoryTypeMale', 'productCategoryTypeFemale'));
    }

    public function profile() {
        $categories_male = $this->list->showCateUsers(STATUS_ON);
        $categories_female = $this->list->showCateUsers(STATUS_OFF);
        if (!Auth::check()) {
            abort(404);
        }
        return view('users.profile.index', compact('categories_male', 'categories_female'));
    }

    public function updateProfile(ProfileRequest $request) {
        if ($request->password != $request->confirm) {
            return redirect()->route('users.profile')->withErrors(['confirm' => 'Mật khẩu chưa khớp!, Vui lòng nhập lại!']);
        } else {
            $data['user_name'] = $request->username;
            $data['email'] = $request->email;
            $data['phone_number'] = $request->phone_number;
            $data['gender'] = $request->gender;
            $data['age'] = $request->age;
            $data['password'] = bcrypt($request->password);
            if($request->hasFile('avatar')) {
                //check lỗi image
                if ($request->file('avatar')->isValid()) {
                    $image_str = time() . '_avatar';
                    $data['avatar'] = $image_str . '.webp';
                    $this->profileService->editProfile($request->email, $data);
                    convert_image_webp($request->file('avatar'), 80, 80)->save(public_path() . '/userfiles/images/users/' . $image_str . '.webp');
                }
            }
        }
        return redirect()->route('users.home');
    }

    public function search(Request $request) {
        $categories_male = $this->list->showCateUsers(STATUS_ON);
        $categories_female = $this->list->showCateUsers(STATUS_OFF);
        $keyword = $request->keyword;
        $productsByKeyword = $this->products->search($keyword);
        return view('users.search.index', compact(
            'categories_male',
            'categories_female',
            'productsByKeyword',
        ));
    }

    public function filter(Request $request) {
        $filter = $request->all();
        unset($filter['_token']);
        $products = $this->products->filterProductSearch($filter);
        $html = $products->count() == 0 ? '<p class="f-bolder">Không có sản phẩm!!!</p>' : '';
        foreach ($products as $product) {
            $html .= $this->output($product);
        }
        return response()->json($html);
    }

    public function output($product) {
        $checkNewProduct = $product->sale > 0 ? '<span class="icon-new bg-sale">' . $product->sale . '%</span>' :
        '<span class="icon-new bg-new">New</span>';
        $oldPrice = $product->sale > 0 ? '<span class="old_price">' . number_format($product->price, 0, ',', '.') . '<sup>vnđ</sup></span>' : '';
        return '<div class="product"><a class="product_image" href="'. route('users.detail', ['id' => $product->product_id]) .'">'.
        '<img src="' . asset('userfiles/images/products/' . $product->image) . '" width="100%" height="300px" alt="">' . $checkNewProduct .
        '</a><div class="star-ratings"><div class="fill-ratings" style="width: ' . $product->rate * 100 / 5 . '%;">' . 
        '<span>★★★★★</span></div><div class="empty-ratings"><span>★★★★★</span></div></div>' .
        '<p>' . $product->product_name . '</p><div class="price"><span class="new_price">' . 
        number_format(price_sale($product->price, $product->sale), 0, ',', '.') .'<sup>vnđ</sup></span>'
        . $oldPrice . '</div><div class="btn-product">
        <a href="javascript:void(0)" data-product-id="' . $product->product_id . '" data-quantity="1" class="btn btn-add-cart col-sm-6 bg-info"><i class="fa fa-shopping-cart"></i>Đặt hàng</a>
        <a href="" class="btn col-sm-6 bg-warning"><i class="fa fa-eye"></i>Xem Nhanh</a>
        </div></div>';
    }
}
