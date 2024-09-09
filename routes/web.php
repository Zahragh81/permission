<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

Route::get('/', fn () => to_route('landing'));

//Route::get('/', function () {
//    return to_route('landing');
//});

// Landing
Route::get('/landing', LandingController::class)->name('landing');

// Auth
Route::prefix('/auth')->controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'registerView')->name('auth.register-view');
        Route::post('/register', 'register')->name('auth.register');

        Route::get('/login', 'loginView')->name('auth.login-view');
        Route::post('/login', 'login')->name('auth.login');
    });

    Route::get('/logout', 'logout')->name('auth.logout')->middleware('auth');
});

// Admin
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard')->can('dashboard');

    // Role
    Route::prefix('/role')->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('role.index');
        Route::get('/create', 'create')->name('role.create');
        Route::post('/store', 'store')->name('role.store');
        Route::get('/edit/{role}', 'edit')->name('role.edit');
        Route::put('/update/{role}', 'update')->name('role.update');
    });

    // Permission
    Route::get('/permission', PermissionController::class)->name('permission.index');

    // User
    Route::prefix('/user')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('user.index')->middleware(['role_or_permission' => ['user_index', 'user_show']]);
        Route::get('/create', 'create')->name('user.create')->can('user_create');
        Route::post('/store', 'store')->name('user.store')->can('user_create');
        Route::get('/show/{user}', 'show')->name('user.show')->can('user_show');
        Route::get('/edit/{user}', 'edit')->name('user.edit')->can('user_edit');
        Route::put('/update/{user}', 'update')->name('user.update')->can('user_edit');
        Route::delete('/destroy/{user}', 'destroy')->name('user.destroy')->can('user_destroy');
    });

    // Admin
    Route::prefix('/admin')->controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index');
        Route::get('/create', 'create')->name('admin.create');
        Route::post('/store', 'store')->name('admin.store');
        Route::get('/edit/{admin}', 'edit')->name('admin.edit');
        Route::put('/update/{admin}', 'update')->name('admin.update');
        Route::delete('/destroy/{admin}', 'destroy')->name('admin.destroy');
    });
});
