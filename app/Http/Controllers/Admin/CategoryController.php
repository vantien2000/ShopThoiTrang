<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ListService;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    protected ListService $listService;
    public function __construct(ListService $listService)
    {
        $this->listService = $listService;
    }

    public function categoryShow(Request $request) {
        $category_name = $request->category_name ?? '';
        $status = $request->status ?? '';
        $sort_num = $request->sort_num ?? '';
        $sort_alpha = $request->sort_alpha ?? '';
        $data = ['category_name' => $category_name, 'status' => $status, 
        'sort_num' => $sort_num, 'sort_alpha' => $sort_alpha];
        $categories = $this->listService->showCate($data);
        return view('admin.categories.index',compact(
            'categories',
        ));
    }

    public function addCategory(CategoryRequest $request) {
        $data = $this->listService->renderDataChecked($request->all());
        if(isset($data['mgs'])) {
            return redirect()->back()->withErrors(['mgs', $data['mgs']]);
        } else {
            $this->listService->addCate($data);
        }
        return redirect()->route('admin.categories');
    }
    
    public function editCategory(CategoryRequest $request) {
        $data = $this->listService->renderDataChecked($request->all());
        if(isset($data['mgs'])) {
            return redirect()->back()->withErrors(['mgs', $data['mgs']]);
        } else {
            unset($data['_token']);
            $this->listService->editCate($request->id, $data);
        }
        return redirect()->route('admin.categories');
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
}
