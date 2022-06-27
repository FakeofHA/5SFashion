<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function Amounts() {
        return $this->hasMany(Amount::class);
    }

    public function Checkers() {
        return $this->hasMany(Checker::class);
    }
}
