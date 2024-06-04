<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_goalkeeper', 'is_presence', 'level'];

    protected $attributes = ['level' => 0];
}
