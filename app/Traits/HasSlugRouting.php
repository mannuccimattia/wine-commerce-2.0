<?php

namespace App\Traits;

trait HasSlugRouting
{
    /**
     * Use slug as index key
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
