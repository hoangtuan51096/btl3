<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Cac bien fillable
    protected $fillable = [
        'name', 'image', 'desc', 'code_product'
    ];
    public function pivot()
    {
        return $this->hasMany(Pivot::class, 'product_id');
    }
}
