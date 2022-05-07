<?php
namespace App\Contracts\Repositories;

use App\Contracts\RepositoryAbstract;
use Models\OrderDetails;

class OrderDetailsRepository extends RepositoryAbstract
{
    protected $orderDetails;
    public function __construct(OrderDetails $orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }
    
    public function storeOrderDetails($data) {
        return $this->orderDetails->create($data);
    }
}