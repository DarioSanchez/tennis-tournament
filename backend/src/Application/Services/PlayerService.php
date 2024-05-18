<?php

namespace Src\Application\Services;

use Src\Domain\Contracts\PlayerRepositoryInterface;

class PlayerService
{
    protected PlayerRepositoryInterface $playerRepository;

    public function __construct(PlayerRepositoryInterface $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function getAllPlayers()
    {
        return $this->playerRepository->findAll();
    }

    public function getPlayerById($id)
    {
        return $this->playerRepository->findById($id);
    }

    public function createPlayer(array $data)
    {
        return $this->playerRepository->save($data);
    }

    public function updatePlayer($id, array $data)
    {
        $player = $this->playerRepository->findById($id);
        if ($player) {
            $player->fill($data);
            return $this->playerRepository->save($player->toArray());
        }
        return null;
    }

    public function deletePlayer($id)
    {
        $player = $this->playerRepository->findById($id);
        if ($player) {
            return $this->playerRepository->delete($id);
        }
        return null;
    }
}
