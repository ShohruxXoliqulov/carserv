<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;

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

// PAGES

Route::get('/', [PageController::class, 'welcome'])->name('home');

Route::prefix('pages/')->name('pages.')->group(function(){
    Route::get('about', [PageController::class, 'about'])->name('about');
    Route::get('error', [PageController::class, 'error'])->name('error');
    Route::get('booking', [PageController::class, 'booking'])->name('booking');
    Route::get('contact', [PageController::class, 'contact'])->name('contact');
    Route::get('services', [PageController::class, 'services'])->name('services');
    Route::get('technicians', [PageController::class, 'technicians'])->name('technicians');
    Route::get('testimonial', [PageController::class, 'testimonial'])->name('testimonial');

});


// ADMIN

Route::prefix('admin/')->middleware('auth')->name('admin.')->group(function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('slider', SliderController::class);

    
});

// AUTH

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
