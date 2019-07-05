<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Storehouse extends Model
{
    protected $fillable = [
        'name', 'account_id'
    ];
    
    public function account()
    {
        return $this->belongsTo(User::class);
    }

    public function pivot()
    {
        return $this->hasMany(Pivot::class, 'store_id');
    }
}
