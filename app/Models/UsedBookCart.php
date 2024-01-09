<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedBookCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'used_book_id',
    ];

    public function usedBook()
    {
        return $this->belongsTo(UsedBook::class);
    }
}
