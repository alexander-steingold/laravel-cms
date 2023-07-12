<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Pages\Home\HomeIntroController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
    });
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/admin/profile', 'edit')->name('profile.edit');
        Route::patch('/admin/profile', 'update')->name('profile.update');
        Route::delete('/admin/profile', 'destroy')->name('profile.destroy');
        Route::post('/admin/upload', 'upload')->name('profile.upload');
    });

    Route::controller(HomeIntroController::class)->group(function () {
        Route::get('/admin/pages/home/intro', 'edit')->name('home_intro.edit');
        Route::patch('/admin/pages/home/intro', 'update')->name('home_intro.update');
        Route::post('/admin/pages/home/intro', 'upload')->name('home_intro.upload');
    });
});

require __DIR__ . '/auth.php';
