<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InvoiceRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $orders;

    public function __construct(OrderService $orders)
    {
        $this->orders = $orders;
    }

    public function index(Request $request) {
        $filter = $request->all();
        $invoices = $this->orders->filterOrder($filter);
        return view('admin.invoices.index', compact('invoices'));
    }

    public function edit(Request $request) {
        $order_id = $request->id;
        $order = $this->orders->showOrder($order_id);
        return view('admin.invoices.edit', compact('order'));
    }

    public function postEdit(InvoiceRequest $request) {
        $order_id = $request->id;
        $data['result'] = $request->result;
        $data['required_date'] = $request->required_date;
        $data['shipper_date'] = $request->shipper_date;
        if (strtotime($request->shipper_date) < strtotime($request->required_date)) {
            return redirect()->back()->withErrors(['mgs' => 'Ngày giao hàng không nhỏ hơn ngày nhận hàng'])->withInput();
        } else {
            $this->orders->updateOrder($order_id, ORDER_ID_KEY, $data);
        }
        return redirect()->route('admin.invoices');
    }

    public function delete(Request $request) {
        $order_id = $request->id;
        $isDelete = $this->orders->deleteOrder($order_id, ORDER_ID_KEY);
        return response()->json(['deleted' => $isDelete, 'message' => 'Xóa Thành Công!!!']);
    }
}
