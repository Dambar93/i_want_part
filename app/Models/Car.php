<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacture_id','model', 'fuel_type', 'wheel_placement', 'engine_code', 'gearbox',
        'body_type', 'color', 'km', 'engine_displacement', 'power','year'
    ];


    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

}
