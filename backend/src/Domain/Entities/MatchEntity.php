<?php

namespace Src\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MatchEntity extends Model
{
    protected $table = 'matches';

    protected $fillable = [
        'tournament_id',
        'player_one_id',
        'player_two_id',
        'winner_id',
        'score_player_one',
        'score_player_two'
    ];


    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    /**
     * @return BelongsTo
     */
    public function playerOne()
    {
        return $this->belongsTo(Player::class, 'player_one_id');
    }

    /**
     * @return BelongsTo
     */
    public function playerTwo()
    {
        return $this->belongsTo(Player::class, 'player_two_id');
    }

    /**
     * @return BelongsTo
     */
    public function winner()
    {
        return $this->belongsTo(Player::class, 'winner_id');
    }

    /**
     * @return BelongsToMany
     */
    public function players()
    {
        return $this->belongsToMany(Player::class, 'match_player');
    }
}
