<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id', 'user_id', 'quantity', 'status', 'phone', 'delivery_address', 'employee_id', 'order_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
