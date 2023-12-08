<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_cart_id',
        'payment',
        'handler_id',
        'status',
    ];

    public function newBookCart()
    {
        return $this->belongsTo(NewBookCart::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
