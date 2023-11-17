<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SecondaryCategory;

class PrimaryCategory extends Model
{
    use HasFactory;

    //hasMany()メソッドでサブカテゴリーのモデルに接続しています。この時1対多の関係を表しています。
    public function secondary()
    {
        return $this->hasMany(SecondaryCategory::class);
    }
}
