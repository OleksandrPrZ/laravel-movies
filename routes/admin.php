<?php

use App\Http\Controllers\Admin\Cast\CastController;
use App\Http\Controllers\Admin\FileUploadController;
use App\Http\Controllers\Admin\Movie\MovieController;
use App\Http\Controllers\Admin\System\User\PermissionController;
use App\Http\Controllers\Admin\System\User\RoleController;
use App\Http\Controllers\Admin\System\User\TokenController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\System\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

Route::group(['prefix' => 'movies'], function () {
    Route::get('/', [MovieController::class, 'index'])->name('admin.movies.index');
    Route::get('/create', [MovieController::class, 'create'])->name('admin.movies.create');
    Route::post('/store', [MovieController::class, 'store'])->name('admin.movies.store');
    Route::get('/{movie}/edit', [MovieController::class, 'edit'])->name('admin.movies.edit');
    Route::put('/{movie}', [MovieController::class, 'update'])->name('admin.movies.update');
    Route::delete('/{movie}', [MovieController::class, 'destroy'])->name('admin.movies.destroy');
    Route::delete('/{movie}/poster', [MovieController::class, 'deletePoster'])->name('admin.movies.deletePoster');
    Route::put('/upload/screenshot', [MovieController::class, 'uploadScreenshot'])->name('admin.movies.screenshot');
});


Route::resource('tags', TagController::class)->names('admin.tags');

Route::resource('casts', CastController::class)->names('admin.casts');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('permissions', PermissionController::class)->names('admin.permissions');

Route::prefix('users')->name('admin.users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('{user}/edit-roles', [UserController::class, 'editRoles'])->name('edit');
    Route::post('{user}/update-roles', [UserController::class, 'updateRoles'])->name('update');
});
Route::post('users/generate-token', [TokenController::class, 'generateFixedToken'])->name('admin.generate.token');
