<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected  $fillable = [
        'user_id',
        'pay_type',
        'trade_place',
        'payment',
        'finish_order_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactionLocation()
    {
        return $this->belongsTo(TransactionLocation::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
