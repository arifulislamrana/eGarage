<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Task;
use App\Traits\UUID;
use App\Models\Order;
use App\Models\Booking;
use App\Models\Service;
use App\Models\EmailVerification;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use UUID;

    public $incrementing = false;

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
        'image',
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

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'user_service');
    }

    public function emailVerification()
    {
        return $this->hasOne(EmailVerification::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
