<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id', 'email', 'status', 'address_id'
    ];

    public function address()
    {
        return $this -> belongsTo(Address::class, 'address_id');
    }

    public function items()
    {
        return $this -> hasMany(OrderItem::class);
    }
}
