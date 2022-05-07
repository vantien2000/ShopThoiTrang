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

    public function getTotalProductsOrdersInTheMonths() {
        return $this->orderRepository->getTotalProductOrderInTheMonths();
    }
}