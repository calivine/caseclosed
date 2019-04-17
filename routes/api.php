<?php

use Illuminate\Http\Request;
use App\Perpetrator;
use App\Http\Resources\Perpetrators;
use App\Http\Resources\Perpetrator as PerpetratorResource;

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
/*
Route::get('perpetrators', function() {
    return new Perpetrators(Perpetrator::all());
}); */

Route::get('perpetrator/{id}', function($id) {
    return new PerpetratorResource(Perpetrator::find($id));
});

Route::get('perpetrators', function() {
    return PerpetratorResource::collection(Perpetrator::all());
});




