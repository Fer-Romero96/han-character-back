<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])
    ->get('/character/{char}', 'App\Http\Controllers\Api\CharactersController@info')
    ->name('api.characters.info');

Route::middleware(['auth:sanctum'])
    ->post('/character', 'App\Http\Controllers\Api\CharactersController@search')
    ->name('api.characters.search');

Route::post('/tokens/create', 'App\Http\Controllers\Api\AuthController@create')
    ->name('api.auth.request');

Route::middleware(['auth:sanctum'])
    ->get('/tokens/revoke', 'App\Http\Controllers\Api\AuthController@revoke')
    ->name('api.auth.revoke');

Route::get('/unauthorized', 'App\Http\Controllers\Api\AuthController@unauthorized')
    ->name('api.auth.unauthorized');
