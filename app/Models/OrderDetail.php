<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'used_book_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function usedBook()
    {
        return $this->belongsTo(UsedBook::class);
    }
}
