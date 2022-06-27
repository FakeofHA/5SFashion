<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    use HasFactory;

    protected $fillalbe = [
        'volume',
        'sizeId',
        'goodId',
    ];

    public function Size() {
        return $this->belongsTo(Size::class);
    }

    public function Good() {
        return $this->belongsTo(Good::class);
    }

    public function Margins() {
        return $this->hasMany(Margin::class);
    }
}
