<?php

namespace Src\Application\Services;

use Src\Domain\Contracts\PowerSpecificPropertyRepositoryInterface;

class PowerSpecificPropertyService
{
    protected $repository;

    public function __construct(PowerSpecificPropertyRepositoryInterface $repository)
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
