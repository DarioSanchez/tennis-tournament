<?php

namespace Src\Domain\Contracts;

interface TournamentPlayerRepositoryInterface
{
    public function findByTournament($tournamentId);
    public function addPlayerToTournament($tournamentId, $playerId);
    public function removePlayerFromTournament($tournamentId, $playerId);
}
