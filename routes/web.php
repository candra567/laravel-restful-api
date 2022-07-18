<?php

use App\Http\Controllers\doctor\LoginDoctorController;
use App\Http\Controllers\officer\DashboardController;
use App\Http\Controllers\officer\LoginOfficerController;
use App\Http\Controllers\societies\RegisterVaksinController;
use App\Http\Controllers\users\LoginController;
use App\Http\Controllers\users\RegisterController;
use App\Http\Controllers\vaccinations\ConsultationsController;
use App\Http\Controllers\vaccinations\RegisterVaccinsController;
use App\Http\Controllers\vaccinations\SpotsController;
use App\Http\Controllers\vaccinations\VaccinationsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth
Route::get('/',[LoginController::class,'index'])->middleware('after');
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'register']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/logout',[LoginController::class,'logout']);
// officer
Route::get('/officer',[LoginOfficerController::class,'index']);
Route::post('/officer',[LoginOfficerController::class,'save']);
Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['admin','societies']);
Route::put('/dashboard',[DashboardController::class,'update'])->middleware(['admin','societies']);
// vaccinations
Route::get('/home',[VaccinationsController::class,'index'])->middleware('societies');
Route::get('/consultations',[ConsultationsController::class,'index'])->middleware('societies');
Route::post('/consultations',[ConsultationsController::class,'save'])->middleware('societies');
Route::get('/spots',[SpotsController::class,'index'])->middleware(['societies','vaccins']);
Route::get('/vaccinations',[LoginController::class,'index'])->middleware('societies');
Route::post('/vaccinations',[RegisterVaccinsController::class,'index'])->middleware(['societies','vaccins']);
Route::post('/joinvaccins',[RegisterVaccinsController::class,'save'])->middleware(['societies','vaccins']);

