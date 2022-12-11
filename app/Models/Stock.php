<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function shoe() {
        return $this->belongsTo(Shoe::class);
    }

    public function size() {
        return $this->belongsTo(Size::class);
    }
}
