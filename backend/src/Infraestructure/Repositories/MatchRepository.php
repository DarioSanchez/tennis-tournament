<?php

namespace Src\Infraestructure\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Src\Domain\Contracts\MatchRepositoryInterface;
use Src\Domain\Entities\MatchEntity;

class MatchRepository implements MatchRepositoryInterface
{
    public function findAll()
    {
        return MatchEntity::all();
    }

    public function findById($id)
    {
        return MatchEntity::findOrFail($id);
    }

    public function save(array $data)
    {
        $match = isset($data['id']) ? MatchEntity::find($data['id']) : new MatchEntity();
        $match->fill($data);
        $match->save();
        return $match;
    }

    public function delete($id)
    {
        $match = MatchEntity::find($id);
        if ($match) {
            $match->delete();
            return true;
        }
        return false;
    }

    public function updateWinner($matchId, $winnerId)
    {
        $match = $this->findById($matchId);
        $match->winner_id = $winnerId;
        $match->save();
    }

    public function findActivePlayersInTournament($tournamentId)
    {
        return MatchEntity::where('tournament_id', $tournamentId)
            ->pluck('player_one_id', 'player_two_id')
            ->all();
    }

    public function findByTournamentId($tournamentId)
    {
        return MatchEntity::with('tournament')
            ->where('tournament_id', $tournamentId)
            ->get();
    }



}

