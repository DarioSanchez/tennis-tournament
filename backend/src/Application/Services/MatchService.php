<?php

namespace Src\Application\Services;

use Exception;
use Src\Domain\Contracts\MatchRepositoryInterface;
use Src\Domain\Contracts\PlayerRepositoryInterface;


class MatchService
{
    protected $matchRepository;
    protected $playerRepository;

    public function __construct(MatchRepositoryInterface $matchRepository, PlayerRepositoryInterface $playerRepository)
    {
        $this->matchRepository = $matchRepository;
        $this->playerRepository = $playerRepository;
    }

    /**
     * @return mixed
     */
    public function getAllMatches()
    {
        return $this->matchRepository->findAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getMatchById($id)
    {
        return $this->matchRepository->findById($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateMatch(array $data)
    {
        return $this->matchRepository->save($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteMatch($id)
    {
        return $this->matchRepository->delete($id);
    }

    /**
     * @param $tournamentId
     * @param $gender
     * @return array
     * @throws Exception
     */
    public function simulateTournamentMatches($tournamentId, $gender)
    {
        $matches = $this->matchRepository->findByTournamentId($tournamentId);

        if (!$matches) {
            throw new Exception("No matches found for this tournament.");
        }

        $results = [];
        foreach ($matches as $match) {

            $playerOne = $this->playerRepository->findById($match->player_one_id);
            $playerTwo = $this->playerRepository->findById($match->player_two_id);
            $playerOneScore = $this->calculateScoreBasedOnGender($playerOne, $gender);
            $playerTwoScore = $this->calculateScoreBasedOnGender($playerTwo, $gender);
            $winnerId = $playerOneScore > $playerTwoScore ? $playerOne->id : $playerTwo->id;
            $this->matchRepository->updateWinner($match->id, $winnerId);
            $match->winner_id = $winnerId;
            $match->save();

            $results[] = [
                'match_id' => $match->id,
                'player_one_id' => $playerOne->id,
                'player_two_id' => $playerTwo->id,
                'player_one_gender' => $playerOne->gender,
                'player_two_gender' => $playerTwo->gender,
                'winner_id' => $winnerId,
                'scores' => ['player_one' => $playerOneScore, 'player_two' => $playerTwoScore]
            ];
        }

        return $results;
    }

    /**
     * @param $player
     * @param $gender
     * @return float|int|mixed
     */
    private function calculateScoreBasedOnGender($player, $gender)
    {
        $baseSkill = $player->skill_level;
        $specificAttribute = 0;

        if ($gender === 'male') {
            $specificAttribute = $player->strength + $player->speed;
        } elseif ($gender === 'female') {
            $specificAttribute = $player->reaction_time;
        }

        $experience = log(1 + $player->matches_played);
        $training = ($baseSkill + $specificAttribute) * $experience;
        $luck = mt_rand(-10, 10) + $training;

        return $baseSkill + $specificAttribute + $luck;
    }


}
