<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\UserRepository\UserRepository;
use App\Repository\BaseRepository\IBaseRepository;
use App\Repository\EmailVerificationRepository\EmailVerificationRepository;
use App\Repository\EmailVerificationRepository\IEmailVerificationRepository;
use App\Repository\EmployeeRepository\IEmployeeRepository;
use App\Repository\EmployeeRepository\EmployeeRepository;
use App\Repository\UserRepository\IUserRepository;
use App\Utility\ILogger;
use App\Utility\Logger;

use function Psy\bin;

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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
