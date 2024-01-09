<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'status',
        'permission',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function accountInfo()
    {
        return $this->hasOne(AccountInfo::class);
    }

    public function teacherAuths()
    {
        return $this->hasOne(TeacherAuth::class);
    }

    public function permission()
    {
       // return $this->belongsTo(Permission::class,'user_id');
    }

    public function usedBook()
    {
        return $this->hasMany(UsedBook::class);
    }

    public function usedBookCart()
    {
        return $this->hasMany(UsedBookCart::class);
    }

    public function teachingMaterial()
    {
        return $this->hasMany(TeachingMaterial::class);
    }

    public function newBookCartsMember()
    {
        return $this->hasMany(NewBookCartsMember::class);
    }

    public function newBookCart()
    {
        return $this->hasMany(NewBookCart::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function schoolOrder()
    {
        return $this->hasMany(SchoolOrder::class);
    }

    public function transactionLocation()
    {
        return $this->belongsTo(TransactionLocation::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    //檢查使用者是否有權限
    public function hasAnyPermission($permissions)
    {
        // 使用者的權限
        $userPermission = $this->permission;

        // 檢查使用者是否有任意一個權限
        return in_array($userPermission, $permissions);
    }

}
