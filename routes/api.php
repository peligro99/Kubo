<?php

use App\Http\Controllers\Api\NumberController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\QueryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('registro',[AuthenticateController::class,'register']);
Route::post('acceso',[AuthenticateController::class,'access']);


Route::group(['middleware' => ['auth:sanctum']], function(){
Route::get('number', [NumberController::class,'index']);
Route::post('number', [NumberController::class,'store']);
Route::get('number/{numberwth}', [NumberController::class,'show']);
Route::put('number/{numberwht}', [NumberController::class,'update']);
Route::delete('number/{numberwht}', [NumberController::class,'destroy']);
// Route::apiResource('number',NumberController::class);
Route::post('logout',[AuthenticateController::class,'logoutSession']);
Route::get('consul', [NumberController::class,'pruebas']);
});
