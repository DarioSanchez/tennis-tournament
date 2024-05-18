<?php

namespace Src\Application\Services;

use Src\Domain\Contracts\PlayerPowerPropertyRepositoryInterface;

class PlayerPowerPropertyService
{
    protected $repository;

    public function __construct(PlayerPowerPropertyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function getAllProperties()
    {
        return $this->repository->findAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPropertyById($id)
    {
        return $this->repository->findById($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateProperty(array $data)
    {
        return $this->repository->save($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteProperty($id)
    {
        return $this->repository->delete($id);
    }
}

