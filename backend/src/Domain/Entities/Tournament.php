<?php

namespace Src\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tournament extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type', 'start_date', 'end_date', 'winner_id'
    ];

    public function matches(): HasMany
    {
        return $this->hasMany(MatchEntity::class);
    }

    public function winner()
    {
        return $this->belongsTo(Player::class, 'winner_id');
    }

}
