<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLocation extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function usedbook()
    {
        return $this->hasMany(UsedBook::class);
    }
}
