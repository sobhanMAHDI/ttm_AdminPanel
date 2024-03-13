<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PerimissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Localization;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobDescriptionController;
use App\Http\Controllers\TaskController;
use App\Models\Permission;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('localization/{locale}', Localization::class)->name('localization');

Route::middleware('localization')->group(function () {
    Route::fallback(function(){
        return view('PageNotFound');
    });
    Route::get('/', [AdminController::class, 'index'])->name('home')->middleware(['auth:web', 'checkUserRole']);
    Route::prefix('admin')->middleware(['guest:web', 'PrevBack'])->name('admin.')->group(function () {
        Route::prefix('user')->middleware('PrevBack')->name('user.')->group(function () {
            Route::get('/login', [AuthController::class, 'login'])->name('login');
            Route::post('/check', [AuthController::class, 'check'])->name('check');
            Route::view('/forgot password', 'admin.auth.forgot')->name('forgot_password');
            Route::get('/reset_password/{token}', [UserController::class, 'reset_password'])->name('reset_password');
            Route::post('/reset-new-password', [UserController::class, 'reset_new_password'])->name('reset_new_password');
            Route::post('/send_password', [UserController::class, 'send_password'])->name('send_password');
        });
    });

    Route::prefix('admin')->middleware(['auth:web', 'PrevBack'])->name('admin.')->group(function () {
        Route::get('/search', [AdminController::class, 'search'])->name('search');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::middleware('checkUserRole')->prefix('user')->name('user.')->group(function () {
            Route::get('/search', [UserController::class, 'search'])->name('search');
            Route::get('/users', [UserController::class, 'index'])->name('users');
            Route::get('/create-user', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::post('/update', [UserController::class, 'update'])->name('update');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        });
        Route::prefix('job')->name('job.')->group(function () {
            Route::get('/search', [JobController::class, 'search'])->name('search');
            Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
            Route::get('/create-job', [JobController::class, 'create'])->name('create');
            Route::post('/store', [JobController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [JobController::class, 'edit'])->name('edit');
            Route::post('/update', [JobController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [JobController::class, 'delete'])->name('delete');
            // گروه بندی مسیرهای مربوط به JobDescription
            Route::group(['prefix' => 'job-description', 'as' => 'description.'], function () {
                Route::get('/index/{id}', [JobDescriptionController::class, 'index'])->name('index');
                Route::get('/edit/{id}', [JobDescriptionController::class, 'edit'])->name('edit');
                Route::post('/store', [JobDescriptionController::class, 'store'])->name('store');
                Route::post('/update', [JobDescriptionController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [JobDescriptionController::class, 'delete'])->name('delete');
            });
        });

        Route::prefix('task')->name('task.')->group(function () {
            Route::get('/search', [TaskController::class, 'search'])->name('search');
            Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
            Route::get('/create', [TaskController::class, 'create'])->name('create');
            Route::post('/store', [TaskController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
            Route::post('/update', [TaskController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [TaskController::class, 'delete'])->name('delete');
        });
        Route::middleware(['checkUserRole'])->prefix('role')->name('role.')->group(function () {
            Route::get('/roles', [RoleController::class, 'index'])->name('roles');
            Route::get('/search', [RoleController::class, 'search'])->name('search');
            Route::get('/role_details/{id}', [RoleController::class, 'show'])->name('show');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
            Route::post('/update', [RoleController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
        });
        Route::middleware(['checkUserRole'])->prefix('permission')->name('permission.')->group(function () {
            Route::get('/search', [PerimissionController::class, 'search'])->name('search');
            Route::get('/permissions', [PerimissionController::class, 'index'])->name('permissions');
            Route::get('/role details/{id}', [PerimissionController::class, 'show'])->name('show');
            Route::get('/create', [PerimissionController::class, 'create'])->name('create');
            Route::post('/store', [PerimissionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PerimissionController::class, 'edit'])->name('edit');
            Route::post('/update', [PerimissionController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [PerimissionController::class, 'delete'])->name('delete');
        });
    });
});
