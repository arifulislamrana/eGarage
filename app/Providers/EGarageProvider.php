<?php

namespace App\Providers;

use function Psy\bin;
use App\Utility\Logger;
use App\Utility\ILogger;
use Illuminate\Support\ServiceProvider;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\UserRepository\UserRepository;
use App\Repository\BaseRepository\IBaseRepository;
use App\Repository\BookingRepository\BookingRepository;
use App\Repository\BookingRepository\IBookingRepository;
use App\Repository\CategoryRepository\CategoryRepository;
use App\Repository\CategoryRepository\ICategoryRepository;
use App\Repository\DiscountRepository\DiscountRepository;
use App\Repository\DiscountRepository\IDiscountRepository;
use App\Repository\UserRepository\IUserRepository;
use App\Repository\ProductRepository\ProductRepository;
use App\Repository\ServiceRepository\ServiceRepository;
use App\Repository\ProductRepository\IProductRepository;
use App\Repository\ServiceRepository\IServiceRepository;
use App\Repository\EmployeeRepository\EmployeeRepository;
use App\Repository\EmployeeRepository\IEmployeeRepository;
use App\Repository\EmailVerificationRepository\EmailVerificationRepository;
use App\Repository\EmailVerificationRepository\IEmailVerificationRepository;
use App\Repository\OrderRepository\IOrderRepository;
use App\Repository\OrderRepository\OrderRepository;
use App\Repository\TaskRepository\ITaskRepository;
use App\Repository\TaskRepository\TaskRepository;

class EGarageProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(ILogger::class, Logger::class);
        $this->app->bind(IEmailVerificationRepository::class, EmailVerificationRepository::class);
        $this->app->bind(IEmployeeRepository::class, EmployeeRepository::class);
        $this->app->bind(IProductRepository::class, ProductRepository::class);
        $this->app->bind(IServiceRepository::class, ServiceRepository::class);
        $this->app->bind(IBookingRepository::class, BookingRepository::class);
        $this->app->bind(ITaskRepository::class, TaskRepository::class);
        $this->app->bind(IOrderRepository::class, OrderRepository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(IDiscountRepository::class, DiscountRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
