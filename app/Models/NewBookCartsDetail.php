<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBookCartsDetail extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'cart_item_id',
        'quantity'
    ];

    public function newBookCartsItem()
    {
        return $this->belongsTo(NewBookCartsItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
