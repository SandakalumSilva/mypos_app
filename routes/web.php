<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'adminDestroy')->name('admin.logout');
    Route::get('/admin/logout/page', 'adminLogoutPage')->name('admin.logout.page');

    Route::middleware(['auth'])->group(function () {
        Route::get('/admin/profile', 'adminProfile')->name('admin.profile');
        Route::post('/admin/profile/store', 'adminProfileStore')->name('admin.profile.store');
        Route::get('/change/password', 'changePassword')->name('admin.change.password');
        Route::post('/update/password', 'updatePassword')->name('update.password');
    });
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/all/employee', 'allEmployee')->name('all.employee');
    Route::get('/add/employee', 'addEmployee')->name('add.employee');
    Route::post('/store/employee', 'storeEmployee')->name('employee.store');
    Route::get('/edit/employee/{id}', 'editEmployee')->name('edit.employee');
    Route::post('/update/employee', 'updateEmployee')->name('employee.update');
    Route::get('/delete/employee/{id}', 'deleteEmploye')->name('delete.employee');
});
