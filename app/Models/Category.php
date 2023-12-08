<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
