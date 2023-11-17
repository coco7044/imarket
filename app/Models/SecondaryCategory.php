<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrimaryCategory;

class SecondaryCategory extends Model
{
    use HasFactory;

    //belongsTo()で親となるPrimaryCategoryモデルに接続しています。
    public function primary()
    {
        return $this->belongsTo(PrimaryCategory::class);
    }
}
