<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'description'    => $this->description,
            'type'           => $this->type,
            'damage_base'    => $this->damage_base,
            'energy_cost'    => $this->energy_cost,
            'cooldown_turns' => $this->cooldown_turns,
            'char_class'     => $this->whenLoaded('charClass', fn () => [
                'id'   => $this->charClass->id,
                'name' => $this->charClass->name,
            ]),
            'kingdom'        => $this->whenLoaded('kingdom', fn () => $this->kingdom ? [
                'id'   => $this->kingdom->id,
                'name' => $this->kingdom->name,
            ] : null),
        ];
    }
}
