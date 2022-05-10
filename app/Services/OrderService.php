<?php
namespace App\Services;

use App\Contracts\Repositories\OrderDetailsRepository;
use App\Contracts\Repositories\OrderRepository;

class OrderService
{
    protected OrderRepository $orderRepository;
    protected OrderDetailsRepository $orderDetailsRepository;

    public function __construct(
        OrderRepository $orderRepository,
        OrderDetailsRepository $orderDetailsRepository
    )
    {
        $this->orderDetailsRepository = $orderDetailsRepository;
        $this->orderRepository = $orderRepository;
    }
    

    public function showOrder($id, $key = ORDER_ID_KEY) {
        return $this->orderRepository->showOrder($id, $key);
    }

    public function storeOrder($data) {
        return $this->orderRepository->storeOrder($data);
    }

    public function storeOrderDetails($data) {
        return $this->orderDetailsRepository->storeOrderDetails($data);
    }

    public function getOrderInsert($key = ORDER_ID_KEY) {
        return $this->orderRepository->getOrderInsert($key);
    }

    public function updateResultOrder($id, $key, $result) {
        return $this->orderRepository->updateResultOrder($id, $key, $result);
    }

    public function deleteOrder($id, $key = ORDER_ID_KEY) {
        return $this->orderRepository->deleteOrder($id, $key);
    }

    public function getOrderByUser($user_id) {
        return $this->orderRepository->getOrderByUser($user_id);
    }

    public function ordersAll() {
        return $this->orderRepository->ordersAll();
    }

    public function updateOrder($id, $key = ORDER_ID_KEY, $data) {
        return $this->orderRepository->updateOrder($id, $key, $data);
    }

    public function filterOrder($filter) {
        return $this->orderRepository->filterOrder($filter);
    }

    public function filterInvoices($filter) {
        return $this->orderRepository->filterInvoices($filter);
    }

    public function getTotalOrdersInMonth($month) {
        return $this->orderRepository->getTotalOrdersInMonth($month);
    }

    public function getTotalOrders($day) {
        return $this->orderRepository->getTotalOrders($day);
    }

    public function getTotalQuantityProductsInDay($day) {
        return $this->orderRepository->getTotalQuantityProductsInDay($day);
    }

    public function getTotalOrdersInDay($day) {
        return $this->orderRepository->getTotalOrdersInDay($day);
    }

    public function getTotalProductsOrdersInTheMonths($month) {
        return $this->orderRepository->getTotalProductOrderInTheMonths($month);
    }

    public function getDataChartLeft($year) {
        return $this->orderRepository->getDataChartLeft($year);
    }

    public function getDataChartRight($day) {
        return $this->orderRepository->getDataChartRight($day);
    }

    public function sellProducts($day) {
        return $this->orderRepository->sellProducts($day);
    }
}