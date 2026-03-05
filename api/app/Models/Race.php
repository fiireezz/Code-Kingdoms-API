<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Model
{
    protected $fillable = [
        'name', 'description',
        'bonus_hp', 'bonus_energy', 'bonus_attack',
        'bonus_defense', 'bonus_speed', 'bonus_magic',
    ];

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
