<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\MockObject\Exception;
use Src\Domain\Entities\MatchEntity;
use Src\Domain\Entities\Player;
use Tests\TestCase;
use Src\Application\Services\MatchService;
use Src\Domain\Contracts\MatchRepositoryInterface;
use Src\Domain\Contracts\PlayerRepositoryInterface;
use Illuminate\Support\Facades\Artisan;

class SimulateTournamentMatchesTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * @throws Exception
     * @throws \Exception
     */
    public function testSimulateTournamentMatches()
    {
        $matchRepoMock = $this->createMock(MatchRepositoryInterface::class);
        $playerRepoMock = $this->createMock(PlayerRepositoryInterface::class);

        $matches = [new MatchEntity(), new MatchEntity()];
        $playerOne = new Player(['id' => 1, 'skill_level' => 50, 'gender' => 'male']);
        $playerTwo = new Player(['id' => 2, 'skill_level' => 45, 'gender' => 'male']);

        $matchRepoMock->method('findByTournamentId')->willReturn($matches);
        $playerRepoMock->method('findById')
            ->willReturnOnConsecutiveCalls($playerOne, $playerTwo);

        $matchService = new MatchService($matchRepoMock, $playerRepoMock);

        $results = $matchService->simulateTournamentMatches(1, 'M');

        $this->assertNotEmpty($results);
        $this->assertIsArray($results);
        $this->assertEquals($results[0]['winner_id'], $playerOne->id);
        $this->assertEquals($results[1]['winner_id'], $playerTwo->id);
    }

}
