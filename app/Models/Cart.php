<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'paid',
        'userId',
    ];

    public function Checkers() {
        return $this->hasMany(Checker::class);
    }

    public function User() {
        return $this->belongsTo(User::class);
    }
}
