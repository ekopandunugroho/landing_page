<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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
    return view('frontend.master');
});

 // Route::get('/Admin/logout', [Admincontroller::class, 'destroy'])->name('admin.logout');
// Route::get('/Admin/profile', [Admincontroller::class, 'profile'])->name('admin.profile');
// Route::get('/edit/profile', [Admincontroller::class, 'editprofile'])->name('edit.profile');

Route::controller(AdminController::class)->group(function () {
    Route::get('/Admin/logout',  'destroy')->name('admin.logout');
    Route::get('/Admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile',  'editprofile')->name('edit.profile');
    Route::post('/store/profile',  'storeprofile')->name('store.profile');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
