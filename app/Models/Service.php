<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_service');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_service');
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_service');
    }
}
