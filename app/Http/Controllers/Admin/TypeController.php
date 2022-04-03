<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ListService;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;

class TypeController extends Controller
{
    protected ListService $listService;
    public function __construct(ListService $listService)
    {
        $this->listService = $listService;
    }

    public function typeShow(Request $request) {
        $filter = $request->all();
        $types = $this->listService->showType($filter);
        $categories = $this->listService->showAllCate();
        return view('admin.types.index', compact('types', 'categories'));
    }

    public function addType(Request $request) {
        $data = $this->listService->renderDataChecked($request->all());
        if(isset($data['mgs'])) {
            return redirect()->back()->withErrors(['mgs', $data['mgs']]);
        } else {
            $this->listService->addType($data);
        }
        return redirect()->route('admin.types');
    }
    
    public function editType(Request $request) {
        $data = $this->listService->renderDataChecked($request->all());
        if(isset($data['mgs'])) {
            return redirect()->back()->withErrors(['mgs', $data['mgs']]);
        } else {
            unset($data['_token']);
            $this->listService->editType($request->id, $data);
        }
        return redirect()->route('admin.types');
    }

    public function deleteType(Request $request) {
        $type_id = $request->id;
        $type = $this->listService->deleteType($type_id);
        if(empty($type_id)) {
            $message = 'không xóa được thông tin này';
        } else {
            $message = 'Xóa thành công';
        }
        return response()->json(['deleted' => $type, 'message' => $message]);
    }
}
