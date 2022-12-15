<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $withCount = ['items'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartShoe::class, 'cart_id');
    }

    public function shoes()
    {
        return $this->belongsToMany(Shoe::class, 'cart_shoe');
    }

    public function getTotalPrice()
    {
        return $this->items()
            ->get()
            ->sum(function ($item) {
                return $item->shoe->price * $item->quantity;
            });
    }
}
