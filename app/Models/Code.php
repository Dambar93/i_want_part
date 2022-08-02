<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'part_id'
    ];

    public function codes()
    {
         return $this->belongsTo(Part::class);
    }
}
