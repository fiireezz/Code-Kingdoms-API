<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dialog extends Model
{
    protected $fillable = ['npc_id', 'order', 'text'];

    public function npc(): BelongsTo
    {
        return $this->belongsTo(Npc::class);
    }
}
