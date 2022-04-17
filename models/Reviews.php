<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    protected $primaryKey = 'review_id';

    protected $fillable = [
        'review_id',
        'rate',
        'review_content',
        'product_id',
        'user_id'
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }

    public function users()
    {
        return $this->belongsTo(UserData::class, 'user_id', 'user_id');
    }
}
