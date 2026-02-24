<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kingdom extends Model
{
    protected $fillable = ['name', 'description', 'lore_excerpt'];

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function npcs(): HasMany
    {
        return $this->hasMany(Npc::class);
    }
}
