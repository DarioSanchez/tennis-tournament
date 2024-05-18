<?php

namespace Src\Domain\Contracts;


interface PlayerRepositoryInterface
{
    public function findAll();
    public function findById($id);
    public function save($playerData);
    public function delete($id);
}
