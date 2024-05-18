<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\Contracts\PlayerRepositoryInterface;
use Src\Infraestructure\Repositories\PlayerRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PlayerRepositoryInterface::class,
            PlayerRepository::class
        );
    }
}
