<?php  

// use App\Http\Controllers\HomeController;  
// use App\Http\Controllers\PenjualanController;  
// use App\Http\Controllers\ProductController;  
use App\Http\Controllers\UserController;  

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;  

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('user.tambah_simpan');

Route::get('/level', [LevelController::class, 'index']);
Route::get('/Kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);


// Route::get('/', [HomeController::class, 'index'])->name('home'); // Rute untuk halaman home  

// Route::get('/sales', [PenjualanController::class, 'index'])->name('sales.index');
// Route::get('/categories', [ProductController::class, 'showCategories']);

// Route::get('/category/{category}', [ProductController::class, 'showCategory'])->name('category.detail');

// Route::get('/category/food-beverage', [ProductController::class, 'showCategory'])->name('products.food-beverage');
// Route::get('/category/beauty-health', [ProductController::class, 'showCategory'])->name('products.beauty-health');
// Route::get('/category/home-care', [ProductController::class, 'showCategory'])->name('products.home-care');
// Route::get('/category/baby-kid', [ProductController::class, 'showCategory'])->name('products.baby-kid');


// Route::get('/user/{id}/name/{name}', [UserController::class, 'user'])->name('user.profile');  
