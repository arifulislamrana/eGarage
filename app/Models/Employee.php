<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $guard = 'employee';

    protected $fillable = [
        'name', 'email', 'password', 'image', 'phone',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
