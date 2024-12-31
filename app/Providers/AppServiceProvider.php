<?php

namespace App\Providers;

use App\Interfaces\AdminInterface;
use App\Interfaces\Backend\CustomerInterface;
use App\Interfaces\Backend\EmployeeInterface;
use App\Interfaces\Backend\SalaryInterface;
use App\Interfaces\Backend\SupplierInterface;
use App\Repositories\AdminRepository;
use App\Repositories\Backend\CustomerRepository;
use App\Repositories\Backend\EmployeeRepository;
use App\Repositories\Backend\SalaryRepository;
use App\Repositories\Backend\SupplierRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminInterface::class, AdminRepository::class);
        $this->app->bind(EmployeeInterface::class, EmployeeRepository::class);
        $this->app->bind(CustomerInterface::class, CustomerRepository::class);
        $this->app->bind(SupplierInterface::class, SupplierRepository::class);
        $this->app->bind(SalaryInterface::class,SalaryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
