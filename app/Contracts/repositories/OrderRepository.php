<?php
namespace App\Contracts\Repositories;

use App\Contracts\RepositoryAbstract;
use Illuminate\Support\Facades\DB;
use Models\OrderDetails;
use Models\Orders;

class OrderRepository extends RepositoryAbstract
{
    protected $orderDetails;
    public function __construct(Orders $orders, OrderDetails $orderDetails)
    {
        $this->orderDetails = $orderDetails;
        $this->modal = $orders;
    }

    public function showOrder($id, $key) {
        return $this->modal->where($key, $id)->first();
    }

    public function storeOrder($data) {
        return $this->modal->create($data);
    }

    public function getOrderInsert($key) {
        return $this->modal->orderByRaw($key . ' desc')->first();
    }

    public function ordersAll() {
        return $this->modal->paginate(5);
    }

    public function updateResultOrder($id, $key, $result) {
        return $this->modal->where($key, $id)->update(['result' => $result]);
    }

    public function deleteOrder($id, $key) {
        return $this->modal->where($key, $id)->delete();
    }

    public function getOrderByUser($user_id) {
        return $this->modal->where('orders.user_id', '=', $user_id)->where('orders.result', '!=', 0)->get();
    }

    public function updateOrder($id, $key, $data) {
        return $this->modal->where($key, $id)->update($data);
    }

    public function filterOrder($filter) {
        $keyword = empty($filter['keyword']) ? '' : $filter['keyword'];
        $orders = $this->modal->where(function($query) use($keyword) {
            $query->orWhere('orders.address_ship','LIKE', '%' . $keyword . '%');
        });
        if (!empty($filter['date_invoice'])) {
            $orders = $orders->where('orders.order_date', $filter['date_invoice']);
        }
        if (!empty($filter['month_invoice']))  {
            $month = explode('-', $filter['month_invoice'])[1];
            $orders = $orders->where(DB::raw('month(orders.order_date)'), '=' ,(int)$month);
        }
        return $orders->paginate(5);
    }

    public function getDataChartLeft($year) {
        return $this->modal->select(DB::raw('month(orders.order_date) as month, sum(order_details.quantity * products.price * (1 - 1/products.sale)) as total, sum(order_details.quantity) as quantity'))
        ->leftJoin('order_details', 'order_details.order_id', '=', 'orders.order_id')
        ->leftJoin('products', 'products.product_id', '=', 'order_details.product_id')
        ->where(DB::raw('YEAR(orders.order_date)'), '=' , $year)
        ->where('result', '!=', 0)
        ->groupBy(DB::raw('month(orders.order_date)'))
        ->get();
    }

    public function getDataChartRight($day) {
        $total= $this->modal->where(DB::raw('orders.order_date'), '=' , $day)->get()->count();
        $orderClosed = $this->modal->where(DB::raw('orders.order_date'), '=' , $day)->where('orders.result', 0)->get()->count();
        $orderPending = $this->modal->where(DB::raw('orders.order_date'), '=' , $day)->where('orders.result', 1)->get()->count();
        $orderFinished = $this->modal->where(DB::raw('orders.order_date'), '=' , $day)->where('orders.result', 2)->get()->count();
        $arr = $total == 0 ? [0,0,0] : [round($orderClosed *100/$total, 0), round($orderPending *100/$total, 0), round($orderFinished *100/$total, 0)];
        return $arr;
    }

    public function filterInvoices($filter) {
        $invoice = $this->modal->select(DB::raw('month(orders.order_date) as month, sum(order_details.quantity * products.price * (1 - 1/products.sale)) as total, sum(order_details.quantity) as quantity'))
        ->leftJoin('order_details', 'order_details.order_id', '=', 'orders.order_id')
        ->leftJoin('products', 'products.product_id', '=', 'order_details.product_id')
        ->groupBy(DB::raw('month(orders.order_date)'));
        if (!empty($filter['month_invoice'])) {
            $month = explode('-', $filter['month_invoice'])[1];
            $year = explode('-', $filter['month_invoice'])[0];
            $invoice = $invoice->where(DB::raw('month(orders.order_date)'), '=' ,(int)$month)->where(DB::raw('year(orders.order_date)'), '=' ,(int)$year);
        }
        return $invoice->get();
    }

    public function sellProducts($day) {
        return $this->orderDetails->select(DB::raw('products.*, sum(order_details.quantity) as total'))
        ->leftJoin('orders', 'orders.order_id', '=', 'order_details.order_id')
        ->leftJoin('products', 'products.product_id', '=', 'order_details.product_id')
        ->where(DB::raw("month(orders.order_date)"), '=' , (int)$day)
        ->where(DB::raw("year(orders.order_date)"), '=' , (int)date_format(now(), "Y"))
        ->where('orders.result', '!=', 0)
        ->groupBy('order_details.product_id')
        ->orderByRaw(DB::raw('total desc'))
        ->get();
    }

    public function getTotalOrders($day) {
        return $this->modal->where(DB::raw('orders.order_date'), '=' , $day)
        ->get();
    }

    public function getTotalQuantityProductsInDay($day) {
        return $this->modal->select(DB::raw('orders.order_date as day, sum(order_details.quantity) as quantity'))
        ->leftJoin('order_details', 'order_details.order_id', '=', 'orders.order_id')
        ->leftJoin('products', 'products.product_id', '=', 'order_details.product_id')
        ->where(DB::raw('orders.order_date'), '=' , $day)
        ->where('result', '!=', 0)
        ->groupBy(DB::raw('orders.order_date'))
        ->get();
    }

    public function getTotalOrdersInDay($day) {
        return $this->modal->select(DB::raw('orders.order_date as day, sum(order_details.quantity * products.price * (1 - 1/products.sale)) as total'))
        ->leftJoin('order_details', 'order_details.order_id', '=', 'orders.order_id')
        ->leftJoin('products', 'products.product_id', '=', 'order_details.product_id')
        ->where(DB::raw('orders.order_date'), '=' , $day)
        ->where('result', '!=', 0)
        ->groupBy(DB::raw('orders.order_date'))
        ->get();
    }


    public function getTotalOrdersInMonth($month) {
        return $this->modal->select(DB::raw('month(orders.order_date) as month, sum(order_details.quantity * products.price * (1 - 1/products.sale)) as total'))
        ->leftJoin('order_details', 'order_details.order_id', '=', 'orders.order_id')
        ->leftJoin('products', 'products.product_id', '=', 'order_details.product_id')
        ->where(DB::raw('month(orders.order_date)'), '=' , $month)
        ->where('result', '!=', 0)
        ->groupBy(DB::raw('month(orders.order_date)'))
        ->get();
    }

    public function getTotalProductOrderInTheMonths($month) {
        return $this->modal->select(DB::raw('orders.order_date, count(products.product_id) as quantity_product, sum(order_details.quantity * products.price * (1 - 1/products.sale)) as total,  sum(order_details.quantity) as quantity_order'))
        ->leftJoin('order_details', 'order_details.order_id', '=', 'orders.order_id')
        ->leftJoin('products', 'products.product_id', '=', 'order_details.product_id')
        ->where(DB::raw('month(orders.order_date)'), '=', $month)
        ->where('orders.result', '!=', 0)
        ->groupBy(DB::raw('orders.order_date'))
        ->get();
    }
    // public function getTotalProductsOrderInYear() {
    //     return $this->modal->select(DB::raw('year(oders.order_date) as month, sum(order_details.quantity * products.price * (1 - 1/products.sale)) as total'))
    //     ->where(DB::raw('year(oders.order_date)'), '=' , $year)
    //     ->groupBy(DB::raw('year(oders.order_date)'))
    //     ->get();
    // }
}