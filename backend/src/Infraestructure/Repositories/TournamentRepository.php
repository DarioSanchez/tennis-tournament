<?php

namespace Src\Infraestructure\Repositories;

use Src\Domain\Contracts\TournamentRepositoryInterface;
use Src\Domain\Entities\Tournament;

class TournamentRepository implements TournamentRepositoryInterface
{
    public function findAll()
    {
        return Tournament::all();
    }

    public function findById($id)
    {
        return Tournament::findOrFail($id);
    }

    public function save(array $data)
    {
        if (isset($data['id'])) {
            $tournament = Tournament::find($data['id']);
            if ($tournament) {
                $tournament->update($data);
                return $tournament;
            }
            throw new \Exception("Tournament not found.");
        } else {
            return Tournament::create($data);
        }
    }

    public function delete($id)
    {
        $tournament = Tournament::find($id);
        if ($tournament) {
            $tournament->delete();
            return true;
        }
        return false;
    }

    public function findHistoricalResults($filters)
    {
        $query = Tournament::query();

        if (isset($filters['date'])) {
            $query->whereDate('created_at', $filters['date']);
        }
        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        return $query->with('matches.winner')->get();
    }

}
