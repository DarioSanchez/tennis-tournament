<?php

namespace Src\Domain\Contracts;

interface MatchRepositoryInterface
{
    public function findAll();
    public function findById($id);
    public function save(array $data);
    public function delete($id);
    public function findByTournamentId($tournamentId);
    public function updateWinner($matchId, $winnerId);
}
