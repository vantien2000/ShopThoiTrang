<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $orders;

    public function __construct(OrderService $orders)
    {
        $this->orders = $orders;
    } 
    public function index()
    {
        $month = date_format(now(),"m");
        $year = date_format(now(),"Y");
        $date = date_format(now(),"Y-m-d");
        // $filter = $request->all();
        $totalQuantityOrderDay = $this->orders->getTotalQuantityProductsInDay($date)->toArray();
        $totalMonthNow = $this->orders->getTotalOrdersInMonth((int) $month)->toArray();
        $totalNow = $this->orders->getTotalOrdersInDay($date)->toArray();
        $totalOrders = $this->orders->getTotalOrders($date)->toArray();
        $chartLeft = $this->orders->getDataChartLeft($year)->toArray();
        $chartRight = $this->orders->getDataChartRight($date);
        $sellProducts = $this->orders->sellProducts((int)$month);
        $productOrdersInMonth = $this->orders->getTotalProductsOrdersInTheMonths((int)$month);
        return view('admin.home.index', compact(
            'totalMonthNow', 
            'totalNow', 
            'totalQuantityOrderDay',
            'totalOrders',
            'chartLeft',
            'chartRight',
            'sellProducts',
            'productOrdersInMonth'
        ));
    }
}
