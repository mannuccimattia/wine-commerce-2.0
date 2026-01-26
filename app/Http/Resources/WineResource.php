<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'winemaker' => [
                'name' => $this->winemaker->name,
                'slug' => $this->winemaker->slug
            ],
            'denomination' => $this->denomination->name,
            'region' => [
                'name' => $this->region->name,
                'slug' => $this->region->slug
            ],
            'category' => [
                'name' => $this->category->name,
                'slug' => $this->category->slug
            ],
            'grapes' => $this->grapes,
            'price' => (float) $this->price,
            'formatted_price' => number_format($this->price, 2, ',', '.') . ' €',
            'alcohol' => (float) $this->alcohol,
            'bottle_size' => (float) $this->bottle_size,
            'vintage' => $this->vintage,
            'temperature' => $this->temperature,
            'description' => $this->description,
            'stock' => $this->stock,
            'slug' => $this->slug,
            'image_front_url' => $this->image_front_url,
            'image_back_url' => $this->image_back_url,
        ];
    }
}
