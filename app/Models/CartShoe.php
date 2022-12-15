<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartShoe extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "cart_shoe";

    protected $with = ['shoe', 'size'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function shoe()
    {
        return $this->belongsTo(Shoe::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
