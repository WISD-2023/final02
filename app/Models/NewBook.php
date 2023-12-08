<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'category_id',
        'name',
        'author',
        'pp',
        'quantity',
        'price',
    ];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function teachingMaterials()
    {
        return $this->hasMany(TeachingMaterial::class);
    }

    public function newBookCartsItem()
    {
        return $this->belongsTo(NewBookCartsItem::class);
    }
}
