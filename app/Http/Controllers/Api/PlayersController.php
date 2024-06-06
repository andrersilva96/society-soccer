<?php

namespace App\Http\Controllers\Api;

use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Controllers\Controller;

class PlayersController extends Controller
{
    protected $model = Player::class;

    public function resolveUser()
    {
        return Auth::guard('sanctum')->user();
    }
}
