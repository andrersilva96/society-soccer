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

    /**
     * Main function to check distributing goalkeepers and normal players to teams.
     * Also makes the validation from business rules.
     */
    public function sort(int $size): void
    {
        $this->size = $size;
        $persons = Player::isPresence()->orderByDesc('level')->get();
        $teamCount = ceil($persons->count() / $size);

        if ($teamCount < 2) {
            throw new \Exception(__('validation.min_teams'));
        }

        if ($persons->count() < $size * 2) {
            throw new \Exception(__('validation.player_insufficient', ['attribute' => ($size * 2) - $persons->count()]));
        }

        $this->sort = Sort::create();

        // Separate players and goal keepers
        $gks = $persons->where('is_goalkeeper', 1);
        $players = $persons->where('is_goalkeeper', 0);

        // Initialize teams
        $this->createTeams($teamCount);
        $this->teamSums = array_fill(0, $teamCount, 0);
        $this->distributePlayers($gks);
        $this->distributePlayers($players);
    }

    /**
     * Distribute the players on the team that have a lower total level,
     * if there is a goalkeeper at the moment, then ignore them.
     * Otherwise, add the player and goalkeeper to the team then sum to total level to keep watching and distribute.
     */
    private function distributePlayers(EloquentCollection $players): void
    {
        foreach ($players as $player) {
            // Find the team with the smallest sum that has not yet reached the maximum size
            $minTeamIndex = array_search(min($this->teamSums), $this->teamSums);
            $team = $this->teams[$minTeamIndex];
            while ($team->players->count() >= $this->size) {
                $minTeamIndex = array_search(min($this->teamSums), $this->teamSums);
            }
            // If already has goalkeeper so get out
            if ($player->is_goalkeeper && $team->players->where('is_goalkeeper', 1)->count()) {
                break;
            }
            // Add player to team
            $team->sorts()->attach($this->sort, ['player_id' => $player->id]);
            $team->refresh();
            // Update team sum
            $this->teamSums[$minTeamIndex] += $player->level;
        }
    }

    private function createTeams(float $count): void
    {
        $this->teams = collect(range(1, $count))->map(fn () => Team::create());
    }
}
