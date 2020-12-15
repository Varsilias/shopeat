<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

use App\Models\Review;

class Product extends Model implements Buyable
{
    use HasFactory;

    protected $fillable = [
        'photo', 'name', 'price', 'stock', 'discount', 'details'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    public function getBuyableDescription($options = null) {
        return $this->name;
    }

    public function getBuyablePrice($options = null) {
        return $this->price;
    }
}
