<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'location',
        'status',
    ];

    /**
     * Get the phones available in this shop.
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
}
