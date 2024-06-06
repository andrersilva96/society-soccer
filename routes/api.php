<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['as' => 'api.'], function() {
    Orion::resource('players', App\Http\Controllers\Api\PlayersController::class);
})->middleware('auth:sanctum');

Route::post('/login', App\Http\Controllers\Api\Actions\Login::class);
