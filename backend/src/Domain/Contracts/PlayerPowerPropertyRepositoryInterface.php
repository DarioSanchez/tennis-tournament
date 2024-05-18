<?php

namespace Src\Domain\Contracts;

interface PlayerPowerPropertyRepositoryInterface
{
    public function findAll();
    public function findById($id);
    public function save(array $data);
    public function delete($id);
}
