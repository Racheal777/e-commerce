<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dresses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'.
        'size',
        'image'
    ];

    public function reviews()
    {
        return $this->morphMany(Reviews::class, 'reviewable');
    }
}
