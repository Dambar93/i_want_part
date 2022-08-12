<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
       'image', 'part_id'
    ];

    public function picture()
    {
        return $this->belongsTo(Parts::class);
    }
}
