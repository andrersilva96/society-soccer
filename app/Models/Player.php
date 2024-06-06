<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Builder};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_goalkeeper', 'is_presence', 'level'];

    protected $attributes = ['level' => 0];

    // Scopes
    public function scopeIsPresence(Builder $query): void
    {
        $query->where('is_presence', 1);
    }
}
