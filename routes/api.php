<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalamityController;
use App\Http\Controllers\EvacuationCenterController;
use App\Http\Controllers\EvacueesController;
use App\Http\Controllers\HeadFamilyController;
use App\Http\Controllers\MembersController;


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
Route::get('/members/{evacuation_center_id}', [MembersController::class, 'getTotalValues']);
Route::get('/members/getMembersStats/{calamity_id}', [MembersController::class, 'getMembersStats']);
Route::get('/members/getEvacueeStats/{evacuation_center_id}', [MembersController::class, 'getTotalStats']);
Route::put('/members/update-evacuation-center/{head_id}', [MembersController::class, 'updateEvacuationCenter']);
