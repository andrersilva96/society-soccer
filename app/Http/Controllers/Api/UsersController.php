<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Controllers\Controller;

class UsersController extends Controller
{
    protected $model = User::class;

    protected $policy = UserPolicy::class;

    public function resolveUser()
    {
        return Auth::guard('sanctum')->user();
    }
}
