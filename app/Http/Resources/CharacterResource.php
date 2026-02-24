<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'level'      => $this->level,
            'experience' => $this->experience,
            'gold'       => $this->gold,
            'stats'      => [
                'hp'         => $this->hp,
                'max_hp'     => $this->max_hp,
                'energy'     => $this->energy,
                'max_energy' => $this->max_energy,
                'attack'     => $this->attack,
                'defense'    => $this->defense,
                'speed'      => $this->speed,
                'magic'      => $this->magic,
            ],
            'kingdom'    => $this->whenLoaded('kingdom',  fn () => new KingdomResource($this->kingdom)),
            'race'       => $this->whenLoaded('race',     fn () => new RaceResource($this->race)),
            'class'      => $this->whenLoaded('charClass',fn () => new CharClassResource($this->charClass)),
            'weapon'     => $this->whenLoaded('weapon',   fn () => $this->weapon ? new WeaponResource($this->weapon) : null),
            'armor'      => $this->whenLoaded('armor',    fn () => $this->armor  ? new ArmorResource($this->armor)  : null),
            'inventory'  => ItemResource::collection($this->whenLoaded('items')),
            'skills'     => SkillResource::collection($this->whenLoaded('skills')),
        ];
    }
}
