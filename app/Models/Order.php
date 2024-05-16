<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table = 'orders';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
    ];

    public function items()
    {
        return $this->hasMany(Order_item::class, 'order_id');
    }
}
