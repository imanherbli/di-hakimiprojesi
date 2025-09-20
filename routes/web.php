<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\BeforeAfterController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VideolarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IconController;
use Illuminate\Support\Facades\Session;

// حفظ اللغة في الجلسة

// الصفحة الرئيسية

 use Illuminate\Support\Facades\App;

 
// routes/web.php
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/lang/{localea}', function ($localea) {
    $allowedLocales = ['en','tr','ar']; // ✅ أضف 'ar'

    if (!in_array($localea, $allowedLocales)) {
        abort(400);
    }

    session(['lang' => $localea]);   
    app()->setLocale($localea);      

    return app(HomeController::class)->index(); 
});





Route::get('/icons', [IconController::class, 'index'])->name('icons.index');
Route::get('/icons/create', [IconController::class, 'create'])->name('icons.create');
Route::post('/icons', [IconController::class, 'store'])->name('icons.store');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
Route::post('/doctor', [DoctorController::class, 'store'])->name('doctor.store');
Route::delete('/doctor/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');

Route::prefix('admin')->group(function() {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

 
Route::get('/videolar', [VideolarController::class, 'index'])->name('videolar.index');
Route::get('/videolar/create', [VideolarController::class, 'create'])->name('videolar.create');
Route::post('/videolar/store', [VideolarController::class, 'store'])->name('videolar.store');
Route::delete('/videolar/{id}', [VideolarController::class, 'destroy'])->name('videolar.destroy');

Route::get('/before_after', [BeforeAfterController::class, 'index'])->name('before_after');
Route::get('/before_after/create', [BeforeAfterController::class, 'create'])->name('before_after.create');
Route::get('/before_after/store', [BeforeAfterController::class, 'store'])->name('before_after.store');
Route::post('before_after/store', [BeforeAfterController::class, 'store'])->name('before_after.store');
 Route::delete('before_after/{id}', [BeforeAfterController::class, 'destroy'])->name('before_after.destroy');
 

Route::get('/login', [AccountController::class, 'login'])->name('login');
Route::post('/login', [AccountController::class, 'doLogin'])->name('login.post'); // ← هذا اللي ناقص
Route::get('/dashboard', [AccountController::class, 'dashboard'])
    ->name('dashboard');
    Route::get('/logout', [AccountController::class, 'logout'])->name('logout');
