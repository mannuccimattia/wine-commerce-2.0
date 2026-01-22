<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasSlugRouting;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    /** @use HasFactory<\Database\Factories\WineFactory> */
    use HasFactory, HasSlugRouting;

    // Unguard everything from mass assignment
    protected $guarded = [];

    /** Filter wines by Category slug. */
    #[Scope]
    protected function ofCategory(Builder $query, string $slug): void
    {
        $query->whereHas('category', fn($q) => $q->where('slug', $slug));
    }

    /** Filter wines between a Price range. */
    #[Scope]
    protected function priceBetween(Builder $query, float $min, float $max): void
    {
        $query->whereBetween('price', [$min, $max]);
    }

    /** Filter wines by Region slug. */
    #[Scope]
    protected function fromRegion(Builder $query, string $slug): void
    {
        $query->whereHas('region', fn($q) => $q->where('slug', $slug));
    }

    /** Filter wines by Winemaker slug. */
    #[Scope]
    protected function fromWinemaker(Builder $query, string $slug): void
    {
        $query->whereHas('winemaker', fn($q) => $q->where('slug', $slug));
    }

    /** Filter wines by Denomination name. */
    #[Scope]
    protected function ofDenomination(Builder $query, string $name): void
    {
        $query->whereHas('denomination', fn($q) => $q->where('name', $name));
    }

    // Relations
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
