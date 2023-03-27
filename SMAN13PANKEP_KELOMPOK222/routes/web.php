<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Auth::routes(['register' => true]);
Route::middleware('auth')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
    Route::post('/profile',[ProfileController::class,'update'])->name('profile.update');
    Route::get('/change-password',[ChangePasswordController::class,'index'])->name('change-password.index');
    Route::post('/change-password',[ChangePasswordController::class,'update'])->name('change-password.update');

    Route::resource('users',UserController::class)->except('show');
    
    Route::prefix('siswa')->group(function(){
        Route::get('/login',[LoginController::class,'siswa'])->name('login-siswa');
    });
});

Route::post('login-proses',[AuthController::class,'proses_login'])->name('login-proses');
Route::post('register-proses',[AuthController::class,'proses_register'])->name('register-proses');
