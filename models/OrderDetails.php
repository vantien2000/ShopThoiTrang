<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $table = 'order_details';

    public $primary_key = 'id';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity'
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }
}
