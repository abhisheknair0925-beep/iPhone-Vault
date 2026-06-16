<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IphoneModel extends Model
{
    use HasFactory;

    // Explicitly define the table name because of standard pluralization
    protected $table = 'iphone_models';

    protected $fillable = [
        'name',
        'image',
        'starting_price',
        'stock',
    ];

    /**
     * Get the individual phones of this model.
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class, 'model_id');
    }
}
