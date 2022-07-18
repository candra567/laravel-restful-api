<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\rest\RegisterController;
use App\Http\Controllers\rest\LoginController;
use App\Http\Controllers\rest\RegionalsController;
use App\Http\Controllers\rest\ConsultationsController;
use App\Http\Controllers\rest\SpotsController;
use App\Http\Controllers\rest\VaccinationsController;

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
// auth
Route::post('/v1/register',[RegisterController::class,'register']);
Route::post('/v1/login',[LoginController::class,'login']);
Route::post('/v1/logout/{token}',[LoginController::class,'logout'])->middleware('rest');
// list regionals
Route::get('/v1/allregionals',[RegionalsController::class,'index']);
Route::get('/v1/getusers/{token}',[RegisterController::class,'getusers'])->middleware('rest');
// consultations
Route::post('/v1/consultations/firstregister/{token}',[ConsultationsController::class,'firstregister'])->middleware('rest');
Route::post('/v1/consultations/secondsregister/{token}',[ConsultationsController::class,'secondsregister'])->middleware('rest');
Route::get('/v1/consultations/firstconsultations/{token}',[ConsultationsController::class,'firstconsultations'])->middleware('rest');
Route::get('/v1/consultations/secondsconsultations/{token}',[ConsultationsController::class,'secondsconsultations'])->middleware('rest');
// vaccnations
Route::get('/v1/spots/{token}',[SpotsController::class,'index'])->middleware('rest');
Route::get('/v1/spots/detail/{token}/{id}',[SpotsController::class,'show'])->middleware('rest');
Route::post('/v1/vaccinations/firstregister/{token}',[VaccinationsController::class,'firstregister'])->middleware('rest');
Route::post('/v1/vaccinations/secondsregister/{token}',[VaccinationsController::class,'secondsregister'])->middleware('rest');
Route::get('/v1/vaccinations/firstvaccinations/{token}',[VaccinationsController::class,'firstvaccinations'])->middleware('rest');
Route::get('/v1/vaccinations/secondsvaccinations/{token}',[VaccinationsController::class,'secondsvaccinations'])->middleware('rest');


