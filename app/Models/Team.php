<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    // Relationships
    public function sorts(): BelongsToMany
    {
        return $this->belongsToMany(Sort::class, 'team_sorts', 'team_id', 'sort_id');
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'team_sorts', 'team_id', 'player_id');
    }
}
