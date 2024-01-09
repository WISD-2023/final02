<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'new_book_id',
    ];

    public function newBook()
    {
        return $this->belongsTo(NewBook::class, 'new_book_id','id');
    }
    public function users()
    {

        return $this->belongsTo(User::class, 'user_id');
    }
}
