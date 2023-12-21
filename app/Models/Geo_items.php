<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geo_items extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'price',
        'color',
        'grade',
    ];

}
