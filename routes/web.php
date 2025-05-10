<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::pattern('id','[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postregister']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function() { // artinya semua route di dalam group ini harus login dulu 
    Route::get('/', [WelcomeController::class, 'index']);

    // artinya semua route di dalam group ini harus punya role ADM (Administrator)
    Route::middleware(['authorize:ADM'])->group(function () {
        Route::prefix('level')->group(function () {
            Route::get('/', [LevelController::class, 'index']);
            Route::post('/list', [LevelController::class, 'list']);
            Route::get('/create', [LevelController::class, 'create']);
            Route::post('/', [LevelController::class, 'store']);
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [LevelController::class, 'store_ajax']);         // Menyimpan data user baru Ajax
            Route::get('/{id}/edit', [LevelController::class, 'edit']);
            Route::put('/{id}', [LevelController::class, 'update']);
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);  // Menampilkan halaman form edit user Ajax
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);     // Menyimpan perubahan data user Ajax
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data user Ajax
            Route::delete('/{id}', [LevelController::class, 'destroy']);
        });      
    });
    

    // ADM & MNG: User, Kategori, Supplier, Barang 
    Route::middleware(['authorize:ADM,MNG'])->group(function() {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index']); // Menampilkan halaman awal user
            Route::post('/list', [UserController::class, 'list']); // Menampilkan data user dalam bentuk JSON untuk DataTables
            Route::get('/create', [UserController::class, 'create']); // Menampilkan halaman form tambah user
            Route::post('/', [UserController::class, 'store']); // Menyimpan data user baru
            Route::get('/create_ajax', [UserController::class,'create_ajax']); //Menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [UserController::class,'store_ajax']); //Menyimpan data user baru Ajax
            Route::get('/{id}', [UserController::class, 'show']); // Menampilkan detail user
            Route::get('/{id}/edit', [UserController::class, 'edit']); // Menampilkan halaman form edit user
            Route::put('/{id}', [UserController::class, 'update']); // Menyimpan perubahan data user
            Route::get('/{id}/show_ajax', [UserController::class,'show_ajax']); //Menampilkan halaman form show user ajax
            Route::get('/{id}/edit_ajax', [UserController::class,'edit_ajax']); //Menampilkan halaman form edit user ajax
            Route::put('/{id}/update_ajax', [UserController::class,'update_ajax']); //Menyimpan perubahan data user ajax
            Route::get('/{id}/delete_ajax',[UserController::class,'confirm_ajax']); //Untuk tampilkan form confirm delete user Ajax
            Route::delete('/{id}/delete_ajax', [UserController::class,'delete_ajax']); //Untuk hapus data user ajax
            Route::delete('/{id}', [UserController::class, 'destroy']); // Menghapus data user
        });

        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']); // Menampilkan halaman awal level
            Route::post('/list', [LevelController::class, 'list']); // Menampilkan data level dalam bentuk JSON untuk DataTables
            Route::get('/create', [LevelController::class, 'create']); // Menampilkan halaman form tambah level
            Route::post('/', [LevelController::class, 'store']); // Menyimpan data level baru
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
            Route::post('/ajax', [LevelController::class, 'store_ajax']);
            Route::get('/{id}', [LevelController::class, 'show']); // Menampilkan detail level
            Route::get('/{id}/edit', [LevelController::class, 'edit']); // Menampilkan halaman form edit level
            Route::put('/{id}', [LevelController::class, 'update']); // Menyimpan perubahan data level
            Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
            Route::delete('/{id}', [LevelController::class, 'destroy']); // Menghapus data level
        });

        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/', [KategoriController::class, 'index']); // Menampilkan halaman awal Kategori
            Route::post('/list', [KategoriController::class, 'list']); // Menampilkan data[Kategori dalam bentuk JSON untuk DataTables
            Route::get('/create', [KategoriController::class, 'create']); // Menampilkan halaman form tambah[Kategori
            Route::post('/', [KategoriController::class, 'store']); // Menyimpan data[Kategori baru
            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
            Route::post('/ajax', [KategoriController::class, 'store_ajax']);
            Route::get('/{id}', [KategoriController::class, 'show']); // Menampilkan detail[Kategori
            Route::get('/{id}/edit', [KategoriController::class, 'edit']); // Menampilkan halaman form edit[Kategori
            Route::put('/{id}', [KategoriController::class, 'update']); // Menyimpan perubahan data[Kategori
            Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
            Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
            Route::delete('/{id}', [KategoriController::class, 'destroy']); // Menghapus data level
        });

        Route::group(['prefix' => 'supplier'], function () {
            Route::get('/', [SupplierController::class, 'index']); // Menampilkan halaman awal Supplier
            Route::post('/list', [SupplierController::class, 'list']); // Menampilkan data[Supplier dalam bentuk JSON untuk DataTables
            Route::get('/create', [SupplierController::class, 'create']); // Menampilkan halaman form tambah[Supplier
            Route::post('/', [SupplierController::class, 'store']); // Menyimpan data[Supplier baru
            Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
            Route::post('/ajax', [SupplierController::class, 'store_ajax']);
            Route::get('/{id}', [SupplierController::class, 'show']); // Menampilkan detail[Supplier
            Route::get('/{id}/edit', [SupplierController::class, 'edit']); // Menampilkan halaman form edit[Supplier
            Route::put('/{id}', [SupplierController::class, 'update']); // Menyimpan perubahan data[Supplier
            Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
            Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
            Route::delete('/{id}', [SupplierController::class, 'destroy']); // Menghapus data level
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::prefix('barang')->group(function () {
            Route::get('/', [BarangController::class, 'index']);
            Route::post('/list', [BarangController::class, 'list']);
            Route::get('/create', [BarangController::class, 'create']);
            Route::post('/', [BarangController::class, 'store']);
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [BarangController::class, 'store_ajax']);         // Menyimpan data user baru Ajax
            Route::get('/{id}', [BarangController::class, 'show']);
            Route::get('/{id}/edit', [BarangController::class, 'edit']);
            Route::put('/{id}', [BarangController::class, 'update']);
            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);  // Menampilkan halaman form edit user Ajax
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);     // Menyimpan perubahan data user Ajax
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // Untuk hapus data user Ajax
            Route::delete('/{id}', [BarangController::class, 'destroy']);
            Route::get('/import', [BarangController::class, 'import']); //ajax form upload excel
            Route::post('/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
            Route::get('/export_excel', [BarangController::class, 'export_excel']);
        });
    });
});
