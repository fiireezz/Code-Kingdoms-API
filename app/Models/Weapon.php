<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Weapon extends Model
{
    protected $fillable = ['name', 'description', 'attack_bonus', 'type', 'price'];

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
