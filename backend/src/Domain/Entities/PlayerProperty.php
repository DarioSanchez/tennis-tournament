<?php

namespace Src\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerProperty extends Model
{
    protected $fillable = ['player_id', 'power_property_id', 'value'];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function powerProperty(): BelongsTo
    {
        return $this->belongsTo(PowerSpecificProperty::class);
    }
}
