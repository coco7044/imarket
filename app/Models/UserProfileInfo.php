<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;


class UserProfileInfo extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'kana',
        'tel',
        'user_id',
        'email',
        'postcode',
        'address', 
        'gender', 
        'memo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
