<?php

use App\Http\Controllers\Admin\Cast\CastController;
use App\Http\Controllers\Admin\FileUploadController;
use App\Http\Controllers\Admin\Movie\MovieController;
use App\Http\Controllers\Admin\Tag\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/movies', [MovieController::class, 'index'])->name('admin.movies.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('admin.movies.create');
Route::post('/movies', [MovieController::class, 'store'])->name('admin.movies.store');
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('admin.movies.edit');
Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('admin.movies.update');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('admin.movies.destroy');

Route::delete('/movies/{movie}/poster', [MovieController::class, 'deletePoster'])->name('admin.movies.deletePoster');

Route::put('/movies/upload/screenshot', [MovieController::class, 'uploadScreenshot'])->name('admin.movies.screenshot');

Route::resource('tags', TagController::class)->names('admin.tags');

Route::resource('casts', CastController::class)->names('admin.casts');

