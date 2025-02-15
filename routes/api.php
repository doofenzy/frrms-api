<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalamityController;
use App\Http\Controllers\EvacuationCenterController;
use App\Http\Controllers\EvacueesController;
use App\Http\Controllers\HeadFamilyController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('calamities', CalamityController::class);
Route::apiResource('evacuation-centers', EvacuationCenterController::class);
Route::get('/evacuation-centers/calamity/{calamityId}', [EvacuationCenterController::class, 'getByCalamity']);
Route::apiResource('/evacuees', EvacueesController::class);
Route::get('/evacuees/calamity/{calamity_id}', [EvacueesController::class, 'getByCalamityId']);
Route::get('/head-family/', [HeadFamilyController::class, 'getHeadFam']);
