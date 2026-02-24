<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharClassResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'role'        => $this->role,
            'has_magic'   => $this->has_magic,
            'base_stats'  => [
                'hp'      => $this->base_hp,
                'energy'  => $this->base_energy,
                'attack'  => $this->base_attack,
                'defense' => $this->base_defense,
                'speed'   => $this->base_speed,
                'magic'   => $this->base_magic,
            ],
        ];
    }
}
