<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'author',
        'pp',
        'isbn',
        'book_image',
        'book_state',
        'price',
        'description',
        'pay_type',
        'trade_place',
        'trade_at',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function teachingMaterials()
    {
        return $this->hasMany(TeachingMaterial::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function transactionLocation()
    {
        return $this->belongsTo(TransactionLocation::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function usedBookCart()
    {
        return $this->hasMany(UsedBookCart::class);
    }
}
