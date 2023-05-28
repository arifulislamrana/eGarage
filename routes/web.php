<?php

use App\Http\Controllers\Auth\UserAuthController;
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

Route::get('/register', [UserAuthController::class, 'registerGet'])->name('register');

Route::post('/registerPost', [UserAuthController::class, 'registerPost'])->name('register.post');

Route::get('/login', [UserAuthController::class, 'loginGet'])->name('login');

Route::post('/loginPost', [UserAuthController::class, 'loginPost'])->name('login.post');

Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

Route::get('/user/verify/{token}', [UserAuthController::class, 'verifyUser'])->name('user.verify');

Route::get('/resend/verification/mail', [UserAuthController::class, 'resendVerificationMail'])->name('user.resendVerification')->middleware('auth');

Route::get('/temp/dashboard', function () {
    return view('user_dashboard.temp_dashboard');
})->name('user.tempDashboard')->middleware('auth');

