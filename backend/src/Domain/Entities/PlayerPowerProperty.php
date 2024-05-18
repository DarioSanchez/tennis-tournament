<?php

namespace Src\Domain\Entities;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PlayerPowerProperty extends Pivot
{
    protected $table = 'player_power_properties';

    protected $fillable = [
        'player_id', 'power_specific_property_id', 'value'
    ];

    public $timestamps = true;

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function powerSpecificProperty()
    {
        return $this->belongsTo(PowerSpecificProperty::class);
    }
}
