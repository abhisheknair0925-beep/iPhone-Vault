<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhoneImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_id',
        'image',
    ];

    /**
     * Get the phone that owns the image.
     */
    public function phone(): BelongsTo
    {
        return $this->belongsTo(Phone::class, 'phone_id');
    }
}
