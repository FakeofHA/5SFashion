<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checker extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'cartId',
        'sizeId',
        'goodId',
    ];

    public function Cart() {
        return $this->belongsTo(Cart::class);
    }

    public function Size() {
        return $this->belongsTo(Size::class);
    }

    public function Good() {
        return $this->belongsTo(Good::class);
    }
}
