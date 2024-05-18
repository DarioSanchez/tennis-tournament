<?php

namespace Src\Infraestructure\Repositories;

use Src\Domain\Contracts\PowerSpecificPropertyRepositoryInterface;
use Src\Domain\Entities\PowerSpecificProperty;

class PowerSpecificPropertyRepository implements PowerSpecificPropertyRepositoryInterface
{
    public function findAll()
    {
        return PowerSpecificProperty::all();
    }

    public function findById($id)
    {
        return PowerSpecificProperty::findOrFail($id);
    }

    public function save(array $data)
    {
        if (isset($data['id'])) {
            $property = PowerSpecificProperty::find($data['id']);
            if ($property) {
                $property->update($data);
                return $property;
            }
            throw new \Exception("Power Specific Property not found.");
        } else {
            return PowerSpecificProperty::create($data);
        }
    }

    public function delete($id)
    {
        $property = PowerSpecificProperty::find($id);
        if ($property) {
            $property->delete();
            return true;
        }
        return false;
    }
}
