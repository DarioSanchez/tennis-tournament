<?php

namespace Src\Infraestructure\Repositories;

use Src\Domain\Contracts\PlayerPowerPropertyRepositoryInterface;
use Src\Domain\Entities\PlayerPowerProperty;

class PlayerPowerPropertyRepository implements PlayerPowerPropertyRepositoryInterface
{
    public function findAll()
    {
        return PlayerPowerProperty::all();
    }

    public function findById($id)
    {
        return PlayerPowerProperty::findOrFail($id);
    }

    public function save(array $data)
    {
        if (isset($data['id'])) {
            $property = PlayerPowerProperty::find($data['id']);
            if ($property) {
                $property->update($data);
                return $property;
            }
            throw new \Exception("PlayerPowerProperty not found.");
        } else {
            return PlayerPowerProperty::create($data);
        }
    }

    public function delete($id)
    {
        $property = PlayerPowerProperty::find($id);
        if ($property) {
            $property->delete();
            return true;
        }
        return false;
    }
}
