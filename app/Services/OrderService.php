<?php
namespace App\Services;

use App\Contracts\Repositories\OrderRepository;

class ListService
{
    protected OrderRepository $orderRepository;

    public function __construct(
        OrderRepository $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
    }

    public function store($data) {
        return $this->orderRepository->store($data);
    }
}