<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBookCartsItem extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'book_cart_id',
        'new_book_id',
    ];

    public function newBook()
    {
        return $this->hasMany(NewBook::class);
    }

    public function newBookCart()
    {
        return $this->belongsTo(NewBookCart::class);
    }

    public function newBookCartsDetail()
    {
        return $this->hasMany(NewBookCartsDetail::class);
    }
}
