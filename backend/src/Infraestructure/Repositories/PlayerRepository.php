<?php

namespace Src\Infraestructure\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Src\Domain\Contracts\PlayerRepositoryInterface;
use Src\Domain\Entities\Player;

class PlayerRepository implements PlayerRepositoryInterface
{
    public function findAll(): Collection
    {
        return Player::all();
    }

    public function findById($id)
    {
        return Player::findOrFail($id);
    }

    /**
     * @throws \Exception
     */
    public function save($playerData)
    {
        if (isset($playerData['id'])) {
            $player = Player::find($playerData['id']);
            if ($player) {
                $player->update($playerData);
                return $player;
            }
            throw new \Exception("Player not found.");
        } else {
            return Player::create($playerData);
        }
    }

    public function delete($id)
    {
        $player = Player::find($id);
        if ($player) {
            $player->delete();
            return true;
        }
        return false;
    }

    public function findPlayersByTournament($tournamentId)
    {
        return Player::select('players.*')
            ->join('tournament_players', 'players.id', '=', 'tournament_players.player_id')
            ->where('tournament_players.tournament_id', $tournamentId)
            ->get();
    }

}
