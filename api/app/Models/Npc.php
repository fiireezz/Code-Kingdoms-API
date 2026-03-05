<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Npc extends Model
{
    protected $fillable = [
        'name', 'kingdom_id', 'role',
        'hp', 'attack', 'defense', 'speed', 'level',
    ];

    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(Kingdom::class);
    }

    public function dialogs(): HasMany
    {
        return $this->hasMany(Dialog::class)->orderBy('order');
    }
}
