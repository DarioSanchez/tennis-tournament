<?php

namespace Src\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TournamentPlayer extends Model
{
    protected $table = 'tournament_players';

    protected $fillable = [
        'tournament_id', 'player_id'
    ];

    /**
     * @return BelongsTo
     */
    public function tournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }

    /**
     * @return BelongsTo
     */
    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
