<?php

namespace Src\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MatchEntity extends Model
{
    protected $fillable = [
        'tournament_id', 'player1_id', 'player2_id', 'winner_id', 'round', 'match_date'
    ];

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'match_player', 'match_id', 'player_id');
    }

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }
}
