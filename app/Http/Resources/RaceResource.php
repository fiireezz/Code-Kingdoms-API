<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RaceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'bonuses'     => [
                'hp'      => $this->bonus_hp,
                'energy'  => $this->bonus_energy,
                'attack'  => $this->bonus_attack,
                'defense' => $this->bonus_defense,
                'speed'   => $this->bonus_speed,
                'magic'   => $this->bonus_magic,
            ],
        ];
    }
}
