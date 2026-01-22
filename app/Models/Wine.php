<?php

namespace App\Models;

use App\Traits\HasSlugRouting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wine extends Model
{
    /** @use HasFactory<\Database\Factories\WineFactory> */
    use HasFactory, HasSlugRouting;

    // Unguard everything from mass assignment
    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function denomination(): BelongsTo
    {
        return $this->belongsTo(Denomination::class);
    }

    public function winemaker(): BelongsTo
    {
        return $this->belongsTo(Winemaker::class);
    }
}
