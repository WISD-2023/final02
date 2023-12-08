<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function newBook()
    {
        return $this->belongsTo(NewBook::class);
    }
}
