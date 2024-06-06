<?php

namespace App\Http\Controllers\Api\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\SortRequest;
use App\Services\TeamService;

class Sort extends Controller
{
    public function __invoke(SortRequest $request): mixed
    {
        try {
            (new TeamService())->sort($request->num);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Sorteados!'
        ], 200);
    }
}
