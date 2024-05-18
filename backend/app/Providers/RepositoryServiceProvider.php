<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\Contracts\MatchRepositoryInterface;
use Src\Domain\Contracts\PlayerPowerPropertyRepositoryInterface;
use Src\Domain\Contracts\PlayerRepositoryInterface;
use Src\Domain\Contracts\PowerSpecificPropertyRepositoryInterface;
use Src\Domain\Contracts\TournamentPlayerRepositoryInterface;
use Src\Domain\Contracts\TournamentRepositoryInterface;
use Src\Infraestructure\Repositories\MatchRepository;
use Src\Infraestructure\Repositories\PlayerPowerPropertyRepository;
use Src\Infraestructure\Repositories\PlayerRepository;
use Src\Infraestructure\Repositories\PowerSpecificPropertyRepository;
use Src\Infraestructure\Repositories\TournamentPlayerRepository;
use Src\Infraestructure\Repositories\TournamentRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PlayerRepositoryInterface::class,
            PlayerRepository::class
        );
        $this->app->bind(
            TournamentRepositoryInterface::class,
            TournamentRepository::class
        );
        $this->app->bind(
            PowerSpecificPropertyRepositoryInterface::class,
            PowerSpecificPropertyRepository::class
        );

        $this->app->bind(
            PlayerPowerPropertyRepositoryInterface::class,
            PlayerPowerPropertyRepository::class
        );

        $this->app->bind(
            MatchRepositoryInterface::class,
            MatchRepository::class
        );

        $this->app->bind(
            TournamentPlayerRepositoryInterface::class,
            TournamentPlayerRepository::class
        );

    }
}
