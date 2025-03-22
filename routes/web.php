<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']); // Menampilkan daftar user
    Route::post('/list', [UserController::class, 'list']); // Menampilkan list user
    Route::get('/create', [UserController::class, 'create']); // Menampilkan form create user
    Route::post('/', [UserController::class, 'store']); // Menyimpan user baru
    Route::get('/{id}', [UserController::class, 'show']); // Menampilkan user tertentu
    Route::get('/{id}/edit', [UserController::class, 'edit']); // Menampilkan form edit user
    Route::put('/{id}', [UserController::class, 'update']); // Mengupdate user
    Route::delete('/{id}', [UserController::class, 'destroy']); // Menghapus user
});
