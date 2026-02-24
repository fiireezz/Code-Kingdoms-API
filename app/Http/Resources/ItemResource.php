<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'description'  => $this->description,
            'effect_type'  => $this->effect_type,
            'effect_value' => $this->effect_value,
            'price'        => $this->price,
            // Quantity existe solo en contexto del inventario del personaje
            'quantity'     => $this->whenPivotLoaded('character_items', fn () => $this->pivot->quantity),
        ];
    }
}
