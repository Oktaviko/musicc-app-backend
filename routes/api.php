<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\AlatMusikController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\RecordingController;

Route::post('admin/login', [AdminAuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']); 
//crud studio
Route::get('/studio', [StudioController::class, 'index']);
Route::post('/studio', [StudioController::class, 'store']);
Route::get('/studio/{id}', [StudioController::class, 'show']);
Route::put('/studio/{id}', [StudioController::class, 'update']);
Route::delete('/studio/{id}', [StudioController::class, 'destroy']);

Route::put('/studio/{id}/status', [StudioController::class, 'updateStatus']);

//crud sewa alat
Route::get('/alatmusik', [AlatMusikController::class, 'index']);
Route::post('/alatmusik', [AlatMusikController::class, 'store']);
Route::get('/alatmusik/{id}', [AlatMusikController::class, 'show']);
Route::put('/alatmusik/{id}', [AlatMusikController::class, 'update']);
Route::delete('/alatmusik/{id}', [AlatMusikController::class, 'destroy']);

Route::put('/alatmusik/{id}/status', [AlatMusikController::class, 'updateStatus']);

//crud recording

Route::get('/recordings', [RecordingController::class, 'index']);
Route::post('/recordings', [RecordingController::class, 'store']);
Route::get('/recordings/{id}', [RecordingController::class, 'show']);
Route::put('/recordings/{id}', [RecordingController::class, 'update']);
Route::delete('/recordings/{id}', [RecordingController::class, 'destroy']);

Route::put('/recordings/{id}/status', [RecordingController::class, 'updateStatus']);

