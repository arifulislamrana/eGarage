<?php

use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\EmployeeAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Employee\DashboardController as EmployeeDashboardController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\TechnicianController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\UserProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/services', [ServiceController::class, 'index'])->name('service');

Route::get('/bookings', [BookingController::class, 'index'])->name('booking');

Route::get('/technicians', [TechnicianController::class, 'index'])->name('technician');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

/////////////////////////////////////// User Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('/register', [UserAuthController::class, 'registerGet'])->name('register');

Route::post('/registerPost', [UserAuthController::class, 'registerPost'])->name('register.post');

Route::get('/login', [UserAuthController::class, 'loginGet'])->name('login');

Route::post('/loginPost', [UserAuthController::class, 'loginPost'])->name('login.post');

Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

Route::get('/user/verify/{token}', [UserAuthController::class, 'verifyUser'])->name('user.verify');

Route::get('/resend/verification/mail', [UserAuthController::class, 'resendVerificationMail'])->name('user.resendVerification')->middleware('auth', 'throttle:5,10');

Route::get('/forget/password', [UserAuthController::class, 'forgetPassGet'])->name('pass.forget');

Route::post('/forget/password/post', [UserAuthController::class, 'forgetPassPost'])->name('pass.forget.post')->middleware('throttle:5,10');

Route::get('/password/reset/{token}', [UserAuthController::class, 'resetPassGet'])->name('pass.reset');

Route::post('/password/reset/post', [UserAuthController::class, 'resetPassPost'])->name('pass.reset.post');

Route::get('/temp/dashboard', function () {
    return view('user_dashboard.temp_dashboard');
})->name('user.tempDashboard')->middleware('auth');

Route::middleware(['auth', 'verify_email'])->group(function () {

    Route::get('/user/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');

    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('user.profile');

    Route::get('/user/profile/edit', [UserProfileController::class, 'edit'])->name('user.edit');

    Route::put('/user/profile/update', [UserProfileController::class, 'update'])->name('user.update');

    Route::get('/user/service/booking', [UserBookingController::class, 'create'])->name('booking.create');

    Route::post('user/service/booking/post', [UserBookingController::class, 'store'])->name('booking.store');

    Route::get('/user/booked/service', [UserBookingController::class, 'myBooking'])->name('user.booking');

    Route::get('/user/booking/edit/{id}', [UserBookingController::class, 'edit'])->name('booking.edit');

    Route::put('/user/booking/update/{id}', [UserBookingController::class, 'update'])->name('booking.update');
});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////// Admin Routes /////////////////////////////////////////////////////////////////////////
Route::get('/admin/login', [AdminAuthController::class, 'loginGet'])->name('admin.login');

Route::post('/admin/login/post', [AdminAuthController::class, 'loginPost'])->name('admin.login.post');

Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->group(function () {

Route::group(['middleware' => ['auth:admin']], function() {

    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('admin.profile');

    Route::get('/bookings', [AdminBookingController::class, 'booking'])->name('admin.booking');

    Route::get('/user/booking/{id}', [AdminBookingController::class, 'show'])->name('admin.booking.show');

    Route::delete('/user/booking/delete/{id}', [AdminBookingController::class, 'destroy'])->name('admin.booking.delete');

    Route::post('/user/booking/approve/{id}', [AdminBookingController::class, 'approve'])->name('admin.booking.approve');

    Route::get('/users', [UserController::class, 'userList'])->name('admin.users');

    Route::get('/users/profile/{id}', [UserController::class, 'show'])->name('admin.users.show');

    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('admin.users.delete');

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    Route::get('/task/{id}', [TaskController::class, 'show'])->name('tasks.show');

    Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');

    Route::put('/task/update/{id}', [TaskController::class, 'update'])->name('tasks.update');

    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::resource('employees', EmployeeController::class);

    Route::resource('products', ProductController::class);
});
});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////// Employee Routes /////////////////////////////////////////////////////////////////////////
Route::get('/employee/login', [EmployeeAuthController::class, 'loginGet'])->name('employee.login');

Route::post('/employee/login/post', [EmployeeAuthController::class, 'loginPost'])->name('employee.login.post');

Route::get('/employee/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');

Route::group(['middleware' => ['auth:employee']], function() {

    Route::get('/employee/dashboard', [EmployeeDashboardController::class, 'dashboard'])->name('employee.dashboard');
});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
