<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBookCartsItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_cart_id',
        'new_book_id',
    ];

    public function newBook()
    {
        return $this->hasMany(NewBook::class);
    }

    public function newBookCartsMember()
    {
        return $this->hasMany(NewBookCartsMember::class);
    }

    public function newBookCart()
    {
        return $this->belongsTo(NewBookCart::class);
    }
}
