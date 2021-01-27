<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware([])->get('/auth/generate-token', function () {
    $user = \App\Models\User::first();
    $token = $user->createToken('token-tester');
    return ['token' => $token->plainTextToken];
});

$middleauth = request()->header('X-CSRF-TOKEN') ? 'auth' : 'auth:sanctum';
// $middleauth = '';

Route::middleware([$middleauth])->get('/auth/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => $middleauth, 'namespace' => 'App\Http\Controllers\Api', 'as' => 'api.'], function () {
    Route::apiResource('regions', 'RegionController');
    Route::apiResource('members', 'MemberController');
    Route::apiResource('premiums', 'PremiumController');
});

