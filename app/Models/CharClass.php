<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CharClass extends Model
{
    protected $table = 'char_classes';

    protected $fillable = [
        'name', 'description', 'role',
        'base_hp', 'base_energy', 'base_attack',
        'base_defense', 'base_speed', 'base_magic',
        'has_magic',
    ];

    protected $casts = [
        'has_magic' => 'boolean',
    ];

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
