<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Character extends Model
{
    protected $fillable = [
        'user_id', 'kingdom_id', 'race_id', 'char_class_id',
        'weapon_id', 'armor_id',
        'name', 'level', 'experience', 'gold',
        'hp', 'max_hp', 'energy', 'max_energy',
        'attack', 'defense', 'speed', 'magic',
    ];

    // ── Relaciones ─────────────────────────────────────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(Kingdom::class);
    }

    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    public function charClass(): BelongsTo
    {
        return $this->belongsTo(CharClass::class);
    }

    public function weapon(): BelongsTo
    {
        return $this->belongsTo(Weapon::class);
    }

    public function armor(): BelongsTo
    {
        return $this->belongsTo(Armor::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'character_items')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'character_skills')
            ->withPivot('is_unlocked')
            ->withTimestamps();
    }
}
