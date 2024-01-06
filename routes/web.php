<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\ProductController as ShopController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\Client\ContactController;

use App\Http\Controllers\Auth\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::prefix('admin')->group(function () {
    Route::get('/index', [AdminHomeController::class, 'index'])->name('admin.home.index');

    Route::prefix('/user')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

    Route::prefix('/menu')->group(function () {
        Route::get('/index', [MenuController::class, 'index'])->name('admin.menu.index');
        Route::get('/create', [MenuController::class, 'create'])->name('admin.menu.create');
        Route::post('/store', [MenuController::class, 'store'])->name('admin.menu.store');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('admin.menu.edit');
        Route::post('/update', [MenuController::class, 'update'])->name('admin.menu.update');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('admin.menu.delete');
    });

    Route::prefix('/category')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::prefix('/product')->group(function () {
        Route::get('/index', [ProductController::class,'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class,'create'])->name('admin.product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    });

    Route::prefix('/post')->group(function () {
        Route::get('/index', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/store', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::post('/update', [PostController::class, 'update'])->name('admin.post.update');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete');
    });

    Route::prefix('/contact')->group(function () {
        Route::get('/index', [AdminContactController::class, 'index'])->name('admin.contact.index');
    });
});

Route::get('/', [ClientHomeController::class, 'index'])->name('client.home.index');

Route::prefix('/post')->group(function () {
    Route::get('/', [ClientPostController::class, 'index'])->name('post.index');
    Route::get('/{id}', [ClientPostController::class, 'detail'])->name('post.detail');
});

Route::prefix('/shop')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('product.index');
    Route::get('/{id}', [ShopController::class, 'detail'])->name('product.detail');
});

Route::prefix('/contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/', [ContactController::class, 'store'])->name('contact.store');

});

Route::prefix('/auth')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.showRegister');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.showLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
