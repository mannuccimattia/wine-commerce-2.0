<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Denomination extends Model
{
    /** @use HasFactory<\Database\Factories\DenominationFactory> */
    use HasFactory;

    public function wines(): HasMany
    {
        return $this->hasMany(Wine::class);
    }
}
