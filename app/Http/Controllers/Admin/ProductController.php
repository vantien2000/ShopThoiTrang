<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\Admin\ListService;
use App\Services\Admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productsService;
    protected ListService $list;
    public function __construct(ProductService $productsService, ListService $list)
    {
        $this->list = $list;
        $this->productsService = $productsService;
    }

    public function index(Request $request) {
        $filter = $request->all();
        $products = $this->productsService->filterProduct($filter);
        $types = $this->list->showAllType();
        return view('admin.products.index', compact('products', 'types'));
    }

    public function showAdd(Request $request) {
        $types = $this->list->showAllType();
        return view('admin.products.create', compact('types'));
    }

    public function showEdit(Request $request) {
        $product_id = $request->id;
        $product = $this->productsService->showProductById($product_id);
        if (empty($product)) {
            abort(404);
        }
        $types = $this->list->showAllType();
        return view('admin.products.edit', compact('types', 'product'));
    }

    public function postAddProduct(ProductRequest $request) {
        $data = $request->all();
        $image_name = $request->image . '.webp';
        convert_image_webp($request->file('image_upload'), 150, 150)->save(public_path() . '/userfiles/images/' . $image_name);
        $data['image'] = $image_name;
        $this->productsService->storeProduct($data);
        return redirect()->route('admin.products');
    }

    public function postEditProduct(ProductRequest $request) {
        $product_id = $request->id;
        $data = $request->all();
        $image_name = $request->image . '.webp';
        $data['image'] = $image_name;
        $data['add_infor'] = $request->add_infor ?? "";
        unset($data['_token']);
        $this->productsService->editProduct($product_id, $data);
        return redirect()->route('admin.products');
    }

    public function deleteProduct(Request $request) {
        $product_id = $request->id;
        $product = $this->productsService->deleteProduct($product_id);
        if(empty($product)) {
            $message = 'không xóa được thông tin này';
        } else {
            $message = 'Xóa thành công';
        }
        return response()->json(['deleted' => $product, 'message' => $message]);
    }

    public function detailProduct(Request $request) {
        $product_id = $request->id;
        $product = $this->productsService->getProductById($product_id);
        return response()->json($product);
    }
}
