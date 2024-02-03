<?php

use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\GroupApiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/events', [EventApiController::class, 'index'])
    ->name('api-events.index');
Route::get('/events/{event}', [EventApiController::class, 'show'])
    ->name('api-events.show');

Route::get('/groups', [GroupApiController::class, 'index'])
    ->name('api-groups.index');
Route::get('/groups/{group}', [GroupApiController::class, 'show'])
    ->name('api-groups.show');
