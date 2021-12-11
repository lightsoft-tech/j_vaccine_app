<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\PatientController;
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

/* home */
Route::get('/', [HomeController::class, 'index']);

/* vaccine */
Route::get('/vaccine', [VaccineController::class, 'index']);
Route::get('/vaccine/add', [VaccineController::class, 'create']);
Route::post('/vaccine/send', [VaccineController::class, 'store']);
Route::post('/vaccine/edit/{vaccine}', [VaccineController::class, 'edit']);
Route::put('/vaccine/update/{vaccine}', [VaccineController::class, 'update']);
Route::delete('/vaccine/delete/{vaccine}', [VaccineController::class, 'destroy']);

/* patient */
Route::get('/patient', [PatientController::class, 'index']);
Route::get('/patient/list-vaccine', [PatientController::class, 'listVaccine']);
Route::get('/patient/add/{vaccine}', [PatientController::class, 'create']);
Route::post('/patient/send/{vaccine}', [PatientController::class, 'store']);
Route::post('/patient/edit/{patient}', [PatientController::class, 'edit']);
Route::put('/patient/update/{patient}', [PatientController::class, 'update']);
Route::delete('/patient/delete/{patient}', [PatientController::class, 'destroy']);