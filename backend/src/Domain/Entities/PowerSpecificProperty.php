<?php

namespace Src\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PowerSpecificProperty extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'value'
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_power_properties')
            ->withPivot('value')
            ->withTimestamps();
    }
}


