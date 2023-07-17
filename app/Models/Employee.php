<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $guard = 'employee';

    protected $fillable = [
        'name', 'email', 'password', 'image', 'phone', 'designation', 'address', 'joining_date',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
