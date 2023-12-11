<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'name',
        'ccl_id'
    ];

    public function usedBook()
    {
        return $this->hasMany(UsedBook::class);
    }

    public function newBook()
    {
        return $this->hasMany(NewBook::class);
    }
}
