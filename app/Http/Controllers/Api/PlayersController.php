<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use App\Policies\PlayerPolicy;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Controllers\Controller;

class PlayersController extends Controller
{
    protected $model = Player::class;

    protected $policy = PlayerPolicy::class;

    protected $request = PlayerRequest::class;

    public function resolveUser()
    {
        return Auth::guard('sanctum')->user();
    }
    
}
