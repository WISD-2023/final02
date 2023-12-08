<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank_branch',
        'account',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
