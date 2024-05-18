<?php

namespace Src\Application\Services;

use Src\Domain\Contracts\TournamentPlayerRepositoryInterface;

class TournamentPlayerService
{
    protected $tournamentPlayerRepository;

    public function __construct(TournamentPlayerRepositoryInterface $tournamentPlayerRepository)
    {
        $this->tournamentPlayerRepository = $tournamentPlayerRepository;
    }

    /**
     * @param $tournamentId
     * @param $playerId
     * @return mixed
     */
    public function registerPlayerToTournament($tournamentId, $playerId)
    {
        return $this->tournamentPlayerRepository->addPlayerToTournament($tournamentId, $playerId);
    }

    /**
     * @param $tournamentId
     * @param $playerId
     * @return mixed
     */
    public function unregisterPlayerFromTournament($tournamentId, $playerId)
    {
        return $this->tournamentPlayerRepository->removePlayerFromTournament($tournamentId, $playerId);
    }

    /**
     * @param $tournamentId
     * @return mixed
     */
    public function getTournamentPlayers($tournamentId)
    {
        return $this->tournamentPlayerRepository->findByTournament($tournamentId);
    }
}
