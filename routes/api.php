<?php

use App\Http\Controllers\Api\User\CreateUserController;
use App\Http\Controllers\Api\User\ListUsersController;
use App\Http\Controllers\Api\User\ShowUserController;
use App\Http\Controllers\Api\User\UpdateUserController;
use App\Http\Controllers\Api\User\DeleteUserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('users', CreateUserController::class);
    Route::get('users', ListUsersController::class);
    Route::get('users/{user}', ShowUserController::class);
    Route::put('users/{user}', UpdateUserController::class);
    Route::delete('users/{user}', DeleteUserController::class);
});
