<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pivot extends Model
{
    protected $fillable = [
        'store_id', 'product_id', 'quantity'
    ];

    public function store()
    {
        return $this->belongsTo(Storehouse::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
