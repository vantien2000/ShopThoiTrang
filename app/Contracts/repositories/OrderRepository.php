<?php
namespace App\Contracts\Repositories;

use App\Contracts\RepositoryAbstract;
use Models\Orders;

class OrderRepository extends RepositoryAbstract
{
    public function __construct(Orders $orders)
    {
        $this->modal = $orders;
    }
}