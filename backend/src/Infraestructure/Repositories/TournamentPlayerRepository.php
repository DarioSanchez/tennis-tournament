<?php

namespace Src\Infraestructure\Repositories;

use Src\Domain\Contracts\TournamentPlayerRepositoryInterface;
use Src\Domain\Entities\TournamentPlayer;

class TournamentPlayerRepository implements TournamentPlayerRepositoryInterface
{
    public function findByTournament($tournamentId)
    {
        return TournamentPlayer::where('tournament_id', $tournamentId)->get();
    }

    public function addPlayerToTournament($tournamentId, $playerId)
    {
        return TournamentPlayer::create([
            'tournament_id' => $tournamentId,
            'player_id' => $playerId
        ]);
    }

    public function removePlayerFromTournament($tournamentId, $playerId)
    {
        return TournamentPlayer::where('tournament_id', $tournamentId)
            ->where('player_id', $playerId)
            ->delete();
    }
}
