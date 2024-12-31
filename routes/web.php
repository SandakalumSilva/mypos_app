<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\SupplierController;
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

/// Employee Route
Route::controller(EmployeeController::class)->group(function () {
    Route::get('/all/employee', 'allEmployee')->name('all.employee');
    Route::get('/add/employee', 'addEmployee')->name('add.employee');
    Route::post('/store/employee', 'storeEmployee')->name('employee.store');
    Route::get('/edit/employee/{id}', 'editEmployee')->name('edit.employee');
    Route::post('/update/employee', 'updateEmployee')->name('employee.update');
    Route::get('/delete/employee/{id}', 'deleteEmploye')->name('delete.employee');
});

/// Customer Route
Route::controller(CustomerController::class)->group(function () {
    Route::get('/all/customer', 'allCustomer')->name('all.customer');
    Route::get('/add/customer', 'addCustomer')->name('add.customer');
    Route::post('/store/customer', 'storeCustomer')->name('customer.store');
    Route::get('/edit/customer/{id}', 'editCustomer')->name('edit.customer');
    Route::post('/update/customer', 'updateCustomer')->name('customer.update');
    Route::get('/delete/customer/{id}', 'deleteCustomer')->name('delete.customer');
});

/// Supplier Route
Route::controller(SupplierController::class)->group(function () {
    Route::get('/all/supplier', 'allSupplier')->name('all.supplier');
    Route::get('/add/supplier', 'addSupplier')->name('add.supplier');
    Route::post('/store/supplier', 'storeSupplier')->name('supplier.store');
    Route::get('/edit/supplier/{id}', 'editSupplier')->name('edit.supplier');
    Route::post('/update/supplier', 'updateSupplier')->name('supplier.update');
    Route::get('/delete/supplier/{id}', 'deleteSupplier')->name('delete.supplier');
    Route::get('details/supplier/{id}', 'detailsSupplier')->name('details.supplier');
});

Route::controller(SalaryController::class)->group(function () {
    Route::get('/add/advance/salary', 'addAdvanceSalary')->name('add.advance.salary');
    Route::post('/advance/salary/store', 'advanceSalaryStore')->name('advance.salary.store');
    Route::get('/all/advance/salary', 'allAdvanceSalary')->name('all.advance.salary');
    Route::get('/edit/advance/salary/{id}', 'editAdvanceSalary')->name('edit.advance.salary');
    Route::post('/advance/salary/update', 'advanceSalaryUpdate')->name('advance.salary.update');
    Route::get('/advance/salary/delete{id}', 'deleteAdvanceSalary')->name('delete.advance.salary');
});
