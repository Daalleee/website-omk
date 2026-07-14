<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// === PUBLIC ROUTES ===
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');
Route::get('/pengurus', [HomeController::class, 'leaders'])->name('leaders');
Route::get('/anggota', [HomeController::class, 'members'])->name('members');
Route::get('/kegiatan', [HomeController::class, 'activities'])->name('activities');
Route::get('/kegiatan/{slug}', [HomeController::class, 'activityDetail'])->name('activity.detail');
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');

// === AUTH ROUTES ===
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');

// === ADMIN ROUTES ===
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/home', [HomeSettingController::class, 'index'])->name('home.index');
    Route::put('/home', [HomeSettingController::class, 'update'])->name('home.update');

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::put('/about', [AboutController::class, 'update'])->name('about.update');

    Route::resource('/leaders', LeaderController::class);
    Route::resource('/members', MemberController::class);
    Route::resource('/activities', ActivityController::class);

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::put('/contact', [ContactController::class, 'update'])->name('contact.update');

    Route::resource('/users', UserController::class)->except(['show']);
});
