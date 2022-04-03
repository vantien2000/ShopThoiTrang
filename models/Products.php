<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_id',
        'title',
        'product_name',
        'image',
        'sale',
        'price',
        'description',
        'quantity',
        'size',
        'add_infor',
        'type_id',
        'status'
    ];

    public $timestamps = false;

    public function types()
    {
        return $this->belongsTo(Types::class, 'type_id', 'type_id');
    }
}
