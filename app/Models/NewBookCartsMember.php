<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBookCartsMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'quantity',
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
