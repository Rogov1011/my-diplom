<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'count', "discount"];

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

}
