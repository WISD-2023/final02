<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAuth extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_proof',
        'auth_at',
        'auth_by',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
