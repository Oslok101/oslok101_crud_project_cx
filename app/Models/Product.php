<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'branch_id',
        'price',
        'purchase_date',
    ];

    function category()
    {
        return $this->BelongsTo('App\Models\Category', 'category_id', 'id');
    }

    function branch()
    {
        return $this->BelongsTo('App\Models\Branch', 'branch_id', 'id');
    }
}
