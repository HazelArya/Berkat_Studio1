<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PackageController;
use Faker\Provider\HtmlLorem;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/package', [PackageController::class, 'index'])->name('package');
Route::get('/aboutus', [PageController::class, 'aboutUs'])->name('aboutus');
Route::get('/portofolio', [PageController::class, 'portofolio'])->name('portofolio');
Route::get('/welcome', [PageController::class, 'welcome'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])
    ->name('admin.dashboard')
    ->middleware('admin');

Route::get('/karyawan/dashboard', [HomeController::class, 'karyawanDashboard'])
    ->name('karyawan.dashboard')
    ->middleware('karyawan');
