<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Back_market_items extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'color',
    ];
}
