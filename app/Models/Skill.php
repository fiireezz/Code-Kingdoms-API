<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    protected $fillable = [
        'name', 'description',
        'char_class_id', 'kingdom_id',
        'type', 'damage_base', 'energy_cost', 'cooldown_turns',
    ];

    public function charClass(): BelongsTo
    {
        return $this->belongsTo(CharClass::class);
    }

    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(Kingdom::class);
    }

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'character_skills')
            ->withPivot('is_unlocked')
            ->withTimestamps();
    }
}
