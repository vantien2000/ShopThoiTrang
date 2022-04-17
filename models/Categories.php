<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Type;

class Categories extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_id',
        'category_name',
        'status',
        'category_type'
    ];

    public $timestamps = false;

    public function types()
    {
        return $this->hasMany(Types::class, 'category_id');
    }
}
