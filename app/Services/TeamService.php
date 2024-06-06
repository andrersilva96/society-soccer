<?php

namespace App\Services;

use App\Models\{Player, Sort, Team};
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class TeamService
{
    private int  $size;
    private Sort $sort;
    private array $teamSums;
    private SupportCollection $teams;

    public function sort(int $size): void
    {
        $this->size = $size;
        $this->sort = Sort::create();
        $persons = Player::isPresence()->orderByDesc('level')->get();

        $gks = $persons->where('is_goalkeeper', 1);
        $players = $persons->where('is_goalkeeper', 0);

        // Initialize teams
        $teamCount = ceil($persons->count() / $size);
        $this->createTeams($teamCount);
        $this->teamSums = array_fill(0, $teamCount, 0);

        $this->distributePlayers($gks);
        $this->distributePlayers($players);
    }

    private function distributePlayers(EloquentCollection $players): void
    {
        foreach ($players as $player) {
            // Find the team with the smallest sum that has not yet reached the maximum size
            $minTeamIndex = array_search(min($this->teamSums), $this->teamSums);
            $team = $this->teams[$minTeamIndex];
            while ($team->sorts->count() >= $this->size) {
                $minTeamIndex = array_search(min($this->teamSums), $this->teamSums);
            }

            // If already has goalkeeper so get out
            if ($player->is_goalkeeper && $team->sorts->where('is_goalkeeper', 1)->count()) {
                break;
            }

            // Add player to team
            $team->sorts()->attach($this->sort, ['player_id' => $player->id]);
            // Update team sum
            $this->teamSums[$minTeamIndex] += $player->level;
        }
    }

    private function createTeams(float $count): void
    {
        $this->teams = collect(range(1, $count))->map(fn () => Team::create());
    }
}
