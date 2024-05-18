<?php

namespace Src\Application\Services;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Domain\Contracts\MatchRepositoryInterface;
use Src\Domain\Contracts\PlayerRepositoryInterface;
use Src\Domain\Contracts\TournamentRepositoryInterface;

class TournamentService
{

    protected PlayerRepositoryInterface $playerRepository;
    protected MatchRepositoryInterface $matchRepository;
    protected TournamentRepositoryInterface $tournamentRepository;

    public function __construct(
        PlayerRepositoryInterface $playerRepository,
        MatchRepositoryInterface $matchRepository,
        TournamentRepositoryInterface $tournamentRepository
    ) {
        $this->playerRepository = $playerRepository;
        $this->matchRepository = $matchRepository;
        $this->tournamentRepository = $tournamentRepository;
    }

    /**
     * @return mixed
     */
    public function getAllTournaments()
    {
        return $this->tournamentRepository->findAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getTournamentById($id)
    {
        return $this->tournamentRepository->findById($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createTournament(array $data)
    {
        return $this->tournamentRepository->save($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateTournament($id, array $data)
    {
        return $this->tournamentRepository->save($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteTournament($id)
    {
        return $this->tournamentRepository->delete($id);
    }

    /**
     * @param $tournamentId
     * @return void
     * @throws Exception
     */
    public function startTournament($tournamentId)
    {

        $players = $this->playerRepository->findPlayersByTournament($tournamentId);

        if (!$this->isPowerOfTwo(count($players))) {
            throw new Exception("The number of players is not a power of two.");
        }

        $matches = $this->generateInitialMatchups($players, $tournamentId);
        foreach ($matches as $matchData) {
            $this->matchRepository->save($matchData);
        }
    }

    private function isPowerOfTwo($number) {
        return ($number & ($number - 1)) == 0 && $number > 0;
    }

    /**
     * @param $players
     * @param $tournamentId
     * @return array
     */
    public function generateInitialMatchups($players, $tournamentId)
    {
        $activePlayerIds = $this->matchRepository->findActivePlayersInTournament($tournamentId);

        // Filtrar jugadores que ya están activos en el torneo
        $filteredPlayers = $players->reject(function ($player) use ($activePlayerIds) {
            return in_array($player->id, $activePlayerIds);
        });

        // Agrupar jugadores por género
        $groupedPlayers = $filteredPlayers->groupBy('gender');

        $matches = [];
        foreach ($groupedPlayers as $players) {
            // Mezclar jugadores dentro de cada grupo de género
            $playersArray = $players->toArray();
            shuffle($playersArray);

            // Formar pares dentro del mismo género
            for ($i = 0; $i < count($playersArray) - 1; $i += 2) {
                if (isset($playersArray[$i + 1])) {
                    $matches[] = [
                        'player_one_id' => $playersArray[$i]['id'],
                        'player_two_id' => $playersArray[$i + 1]['id'],
                        'tournament_id' => $tournamentId,
                    ];
                }
            }
        }

        return $matches;
    }

    /**
     * @throws Exception
     */
    public function getTournamentWinner($tournamentId)
    {
        $tournament = $this->tournamentRepository->findById($tournamentId);
        if (!$tournament) {
            throw new Exception("Tournament not found.");
        }
        return $tournament->matches()->where('final_match', true)->first()->winner;
    }

    /**
     * @param $filters
     * @return Builder[]|Collection
     */
    public function getHistoricalResults($filters)
    {
        return $this->tournamentRepository->findHistoricalResults($filters);
    }


}
