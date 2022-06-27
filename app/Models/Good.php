<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'classifyId',
        'userId',
        'segmentId',
    ];

    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Segment() {
        return $this->belongsTo(Segment::class);
    }

    public function Classify() {
        return $this->belongsTo(Classify::class);
    }

    public function Checkers() {
        return $this->hasMany(Checker::class);
    }

    public function Amounts() {
        return $this->hasMany(Amount::class);
    }
}
