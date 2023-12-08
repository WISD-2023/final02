<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBookCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'invite_code',
        'type',
        'deadline_at',
        'is_submit',
    ];

    public function newBookCartsItem()
    {
        return $this->hasMany(NewBookCartsItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schoolOrder()
    {
        return $this->hasMany(SchoolOrder::class);
    }
}
