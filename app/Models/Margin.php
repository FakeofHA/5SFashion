<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Margin extends Model
{
    use HasFactory;

    protected $fillable = [
        'cost',
        'price',
        'volume',
        'status',
        'amountId',
    ];

    public function Amount() {
        return $this->hasMany(Amount::class);
    }
}
