<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $table = 'orders';

    public $primary_key = 'order_id';

    protected $fillable = [
        'order_id',
        'user_id',
        'order_date',
        'required_date',
        'shiper_date',
        'shiper_cost',
        'status',
        'comment',
        'result',
        'address_ship'
    ];

    public $timestamps = false;

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'order_id');
    }

    public function users()
    {
        return $this->belongsTo(UserData::class, 'user_id', 'user_id');
    }
}
