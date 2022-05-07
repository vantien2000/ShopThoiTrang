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

    public function getTotalOrdersInMonth($month) {
        return $this->modal->select(DB::raw('month(orders.order_date) as month, sum(order_details.quantity * products.price * (1 - 1/products.sale)) as total'))
        ->leftJoin('order_details', 'order_details.order_id', '=', 'orders.order_id')
        ->leftJoin('products', 'products.product_id', '=', 'order_details.product_id')
        ->where(DB::raw('month(orders.order_date)'), '=' , $month)
        ->groupBy(DB::raw('month(orders.order_date)'))
        ->get();
    }

    public function getTotalProductOrderInTheMonths() {
        return $this->modal->select(DB::raw('month(orders.order_date) as month, sum(order_details.quantity * products.price * (1 - 1/products.sale)) as total, sum(order_details.quantity) as quantity'))
        ->leftJoin('order_details', 'order_details.order_id', '=', 'orders.order_id')
        ->leftJoin('products', 'products.product_id', '=', 'order_details.product_id')
        ->groupBy(DB::raw('month(orders.order_date)'))
        ->get();
    }
    // public function getTotalProductsOrderInYear() {
    //     return $this->modal->select(DB::raw('year(oders.order_date) as month, sum(order_details.quantity * products.price * (1 - 1/products.sale)) as total'))
    //     ->where(DB::raw('year(oders.order_date)'), '=' , $year)
    //     ->groupBy(DB::raw('year(oders.order_date)'))
    //     ->get();
    // }
}