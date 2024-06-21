<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\TaskManagementController;
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


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthenticationController::class, 'create'])->name('register');
    Route::post('/register', [AuthenticationController::class, 'store'])->name('register.create');
    Route::get('/login', [AuthenticationController::class, 'userLoginView'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'userLogin'])->name('login.check');
});
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::delete('/account', [AuthenticationController::class, 'deleteAccount'])->name('account.delete');
    Route::get('/', [TaskManagementController::class, 'index'])->name('home');
    Route::get('/add', [TaskManagementController::class, 'create'])->name('add');
    Route::post('/add', [TaskManagementController::class, 'store'])->name('add.insert');
    Route::delete('/delete/{id}', [TaskManagementController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}', [TaskManagementController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [TaskManagementController::class, 'update'])->name('tasks.update');
    Route::put('/update/{id}', [TaskManagementController::class, 'updateTaskStatus'])->name('tasks.update-status');
    Route::get('/profile', [AuthenticationController::class, 'userProfile'])->name('profile');
    Route::put('/imgupload', [AuthenticationController::class, 'uploadimg'])->name('imgupload');
});

