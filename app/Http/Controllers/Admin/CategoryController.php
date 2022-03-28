<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    protected ListService $listService;
    public function __construct(ListService $listService)
    {
        $this->listService = $listService;
    }

    public function index() {
        $categories = $this->listService->showCate();
        $types = $this->listService->showType();
        return view('admin.categories.index',compact(
            'categories',
            'types'
        ));
    }

    public function addCategory(Request $request) {
        $category = $this->listService->addCate($request->all());
        if(!empty($request->category_name)) {
            $message = 'Thêm thành công';
        } else{
            $message = 'Category name không được bỏ trống';
        }
        return response()->json(['category' => $category, 'message' => $message]);
    }
    
    public function editCategory(Request $request) {
        $category_id = $request->id;
        $category = $this->listService->editCate($category_id, $request->all());
        if(!empty($request->category_name)) {
            $message = 'Sửa thành công';
        } else {
            $message = 'Category name không được bỏ trống';
        }
        return response()->json(['category' => $category, 'message' => $message]);
    }

    public function deleteCategory(Request $request) {
        $category_id = $request->id;
        $category = $this->listService->deleteCate($category_id);
        if(empty($category_id)) {
            $message = 'không xóa được thông tin này';
        } else {
            $message = 'Xóa thành công';
        }
        return response()->json(['deleted' => $category, 'message' => $message]);
    }

    public function addType(Request $request) {
        $type = $this->listService->addType($request->all());
        $category = $this->listService->showCateById($request->category_id);
        if(!empty($request->type_name)) {
            $message = 'Thêm thành công';
        } else{
            $message = 'Type name không được bỏ trống';
        }
        return response()->json(['type' => $type, 'category_name' => $category->category_name, 'message' => $message]);
    }
    
    public function editType(Request $request) {
        $type_id = $request->id;
        $type = $this->listService->editType($type_id, $request->all());
        $category = $this->listService->showCateById($request->category_id);
        if(!empty($request->type_name)) {
            $message = 'Sửa thành công';
        } else {
            $message = 'Category name không được bỏ trống';
        }
        return response()->json(['type' => $type, 'category_name' => $category->category_name, 'message' => $message]);
    }

    public function deleteType(Request $request) {
        $type_id = $request->id;
        $type = $this->listService->deleteCate($type_id);
        if(empty($category_id)) {
            $message = 'không xóa được thông tin này';
        } else {
            $message = 'Xóa thành công';
        }
        return response()->json(['deleted' => $type, 'message' => $message]);
    }
}
