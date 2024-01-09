<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBookCartsMember extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'new_book_cart_id',
        'is_owner',
    ];

    public  function newBookCart()
    {
        return $this->belongsTo(NewBookCart::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
