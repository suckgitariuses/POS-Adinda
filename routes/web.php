<?php  

use App\Http\Controllers\HomeController;  
use App\Http\Controllers\PenjualanController;  
use App\Http\Controllers\ProductController;  
use App\Http\Controllers\UserController;  
use Illuminate\Support\Facades\Route;  

Route::get('/', [HomeController::class, 'index'])->name('home'); // Rute untuk halaman home  

Route::get('/sales', [PenjualanController::class, 'sales'])->name('sales');  

Route::get('/categories', [ProductController::class, 'showCategories'])->name('categories');  
Route::get('/category/{category}', [ProductController::class, 'showCategory'])->name('category.detail');  

Route::get('/user/{id}/name/{name}', [UserController::class, 'user'])->name('user.profile');  