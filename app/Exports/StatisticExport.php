<?php

namespace App\Exports;

use App\Services\OrderService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StatisticExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $orders;

    public function __construct(OrderService $orders)
    {
        $this->orders = $orders;
    } 
    
    public function collection()
    {
        return $this->orders->filterInvoices([]);
    }

    public function headings() :array {
    	return ["Tháng", "Tổng doanh thu", "Tổng sản phẩm đã bán"];
    }
}
