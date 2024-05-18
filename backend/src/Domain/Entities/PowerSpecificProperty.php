<?php

namespace Src\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PowerSpecificProperty extends Model
{
    protected $fillable = ['name'];

    public function playerProperties(): HasMany
    {
        return $this->hasMany(PlayerProperty::class);
    }
}

