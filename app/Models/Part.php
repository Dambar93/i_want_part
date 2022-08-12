<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'price', 'sku', 'title', 'comment', 'part_code', 'quantity', 'category_id',
        'manufacture_id', 'car_id', 'condition'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function codes()
    {
        return $this->hasMany(Code::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
