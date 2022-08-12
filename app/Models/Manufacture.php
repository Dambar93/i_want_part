<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manufacture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function manufacture(): hasMany
    {
        return $this->hasMany(Part::class);
    }
}
