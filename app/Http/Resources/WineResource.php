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
            'slug' => $this->slug,
            'price' => $this->price,
            'alcohol' => $this->alcohol,
            'bottle_size' => $this->bottle_size,
            'vintage' => $this->vintage,
            'stock' => $this->stock,
            'image_front_url' => $this->image_front_url,
            'image_back_url' => $this->image_back_url,
            'grapes' => $this->grapes,
            'temperature' => $this->temperature,
            'description' => $this->description,
            'category' => $this->category->name,
            'region' => $this->region->name,
            'denomination' => $this->denomination->name,
            'winemaker' => $this->winemaker->name,
        ];
    }
}
