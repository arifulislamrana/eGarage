<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'price', 'description', 'image', 'status', 'category_id', 'discount_id', 'buying_price', 'dealer', 'quantity', 'sold'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
