<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    // Relationships
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_sorts', 'sort_id', 'team_id')
            ->groupBy('team_sorts.team_id');
    }
}
