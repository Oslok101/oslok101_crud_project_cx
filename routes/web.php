<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
 
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('registeruser', function(){
    return view('auth/register');
})->middleware('auth')->name('registeruser');


Route::get('/', function () {
    return view('auth.login');
})->middleware('auth');
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
Route::middleware(['auth', 'admin'])->group(function () {
 
    Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('/admin/products/editAdmin/{id}', [ProductController::class, 'editAdmin'])->name('admin/products/editAdmin');
    Route::put('/admin/products/editAdmin/{id}', [ProductController::class, 'updateAdmin'])->name('admin/products/updateAdmin');
});

Route::middleware(['auth', 'user'])->group(function () {
 
    Route::get('user/dashboard', [HomeController::class, 'userIndex']);
 
    Route::get('/user/products', [ProductController::class, 'userIndex'])->name('user/products');
    Route::get('/user/products/create', [ProductController::class, 'create'])->name('user/products/create');
    Route::post('/user/products/save', [ProductController::class, 'save'])->name('user/products/save');
    Route::get('/user/products/edit/{id}', [ProductController::class, 'edit'])->name('user/products/edit');
    Route::put('/user/products/edit/{id}', [ProductController::class, 'update'])->name('user/products/update');
    Route::get('/user/products/delete/{id}', [ProductController::class, 'delete'])->name('user/products/delete');
});

 
require __DIR__.'/auth.php';
 
//Route::get('admin/dashboard', [HomeController::class, 'index']);
//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);