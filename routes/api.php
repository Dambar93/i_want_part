<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\User\PartController;
use App\Http\Controllers\API\PartController;
use App\Http\Controllers\API\TokenController;
use App\Http\Controllers\API\OrderController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('part-list/new','App\Http\Controllers\API\PartController@new');
    Route::get('order','App\Http\Controllers\API\OrderController@listLogged');
});
Route::apiResource('part-list', 'App\Http\Controllers\API\PartController');
Route::post('get-token','App\Http\Controllers\API\TokenController@getToken');
Route::post('register','App\Http\Controllers\API\RegisterController@register');
Route::post('order','App\Http\Controllers\API\OrderController@create');
Route::post('find-order','App\Http\Controllers\API\OrderController@findOrder');

