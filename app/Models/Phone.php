<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'shop_id',
        'color',
        'storage',
        'battery_health',
        'condition_grade',
        'price',
        'description',
        'status',
    ];

    /**
     * Get the iPhone model details.
     */
    public function model(): BelongsTo
    {
        return $this->belongsTo(IphoneModel::class, 'model_id');
    }

    /**
     * Get the shop where this phone is located.
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    /**
     * Get the images for this phone.
     */
    public function images(): HasMany
    {
        return $this->hasMany(PhoneImage::class, 'phone_id');
    }
}
