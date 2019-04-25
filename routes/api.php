<?php

use Illuminate\Http\Request;
use App\Perpetrator;
use App\Http\Resources\Perpetrator as PerpetratorResource;
use App\Victim;
use App\Http\Resources\Victim as VictimResource;

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

Route::get('perpetrator/{id}', function($id) {
    return new PerpetratorResource(Perpetrator::find($id));
});

Route::get('perpetrators', function() {
    return PerpetratorResource::collection(Perpetrator::all());
});

Route::get('victims', function() {
    return VictimResource::collection(Victim::all());
});




