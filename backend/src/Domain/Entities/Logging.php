<?php

namespace Src\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    protected $fillable = ['message', 'level', 'context'];

}
