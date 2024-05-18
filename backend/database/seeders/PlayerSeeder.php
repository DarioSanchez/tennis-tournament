<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Src\Domain\Entities\Player;
use App\Models\PlayerPowerProperty;
use Src\Domain\Entities\Tournament;
use Src\Domain\Entities\TournamentPlayer;


class PlayerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $tournament = Tournament::create([
            'name' => $faker->sentence,
            'type' => 'Open',
            'status' => 'planned',
            'start_date' => $faker->dateTimeBetween('+1 week', '+2 weeks'),
            'end_date' => $faker->dateTimeBetween('+3 weeks', '+1 month')
        ]);

        foreach (range(1, 5) as $index) {
            $malePlayer = Player::create([
                'name' => $faker->name('M'),
                'skill_level' => $faker->numberBetween(1, 100),
                'gender' => 'M',
                'eliminated' => false,
                'matches_played' => $faker->numberBetween(0, 10)
            ]);

            PlayerPowerProperty::create([
                'player_id' => $malePlayer->id,
                'power_specific_property_id' => 1,
                'value' => $faker->numberBetween(1, 20)
            ]);

            PlayerPowerProperty::create([
                'player_id' => $malePlayer->id,
                'power_specific_property_id' => 2,
                'value' => $faker->numberBetween(1, 20)
            ]);

            TournamentPlayer::create([
                'tournament_id' => $tournament->id,
                'player_id' => $malePlayer->id
            ]);

            $femalePlayer = Player::create([
                'name' => $faker->name('F'),
                'skill_level' => $faker->numberBetween(1, 100),
                'gender' => 'F',
                'eliminated' => false,
                'matches_played' => $faker->numberBetween(0, 10)
            ]);

            PlayerPowerProperty::create([
                'player_id' => $femalePlayer->id,
                'power_specific_property_id' => 3,
                'value' => $faker->numberBetween(1, 20)
            ]);

            TournamentPlayer::create([
                'tournament_id' => $tournament->id,
                'player_id' => $femalePlayer->id
            ]);
        }
    }
}
