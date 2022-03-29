<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Types extends Model
{
    protected $table = 'types';

    protected $primaryKey = 'type_id';

    protected $fillable = [
        'type_id',
        'type_name',
        'category_id',
        'status'
    ];

    public $timestamps = false;

    public function categories() {
        return $this->belongsTo(Categories::class, 'category_id', 'category_id');
    }
}