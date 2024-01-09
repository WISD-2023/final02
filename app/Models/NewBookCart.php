<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBookCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'invite_code',
        'type',
        'deadline_at',
        'is_submit',
    ];

    public function newBookCartsItem()
    {
        return $this->hasMany(NewBookCartsItem::class);
    }

    public function newBookCartsMember()
    {
        return $this->hasMany(NewBookCartsMember::class);
    }

    public function schoolOrder()
    {
        return $this->hasMany(SchoolOrder::class);
    }
}
