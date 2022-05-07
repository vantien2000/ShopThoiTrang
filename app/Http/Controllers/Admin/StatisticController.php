<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StatisticExport;
use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StatisticController extends Controller
{
    protected $orders;

    public function __construct(OrderService $orders)
    {
        $this->orders = $orders;
    } 
    public function index(Request $request) {
        $month = date_format(now(), "m");
        $filter = $request->all();
        $totalMonthNow = $this->orders->getTotalOrdersInMonth((int) $month);
        $statistic = $this->orders->filterInvoices($filter);
        return view('admin.statistic.index', compact('totalMonthNow', 'statistic'));
    }

    public function export() {
        return Excel::download(new StatisticExport($this->orders), 'doanthu.xlsx');
    }
}
