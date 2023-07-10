<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
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
});

require __DIR__ . '/auth.php';
