<?php

namespace App\Providers;

use App\Interfaces\AdminInterface;
use App\Interfaces\Backend\EmployeeInterface;
use App\Repositories\AdminRepository;
use App\Repositories\Backend\EmployeeRepository;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
