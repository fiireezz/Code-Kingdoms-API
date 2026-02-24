<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NpcResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id,
            'name'    => $this->name,
            'role'    => $this->role,
            'level'   => $this->level,
            'stats'   => [
                'hp'      => $this->hp,
                'attack'  => $this->attack,
                'defense' => $this->defense,
                'speed'   => $this->speed,
            ],
            'kingdom' => $this->whenLoaded('kingdom', fn () => $this->kingdom ? [
                'id'   => $this->kingdom->id,
                'name' => $this->kingdom->name,
            ] : null),
            'dialogs' => DialogResource::collection($this->whenLoaded('dialogs')),
        ];
    }
}
