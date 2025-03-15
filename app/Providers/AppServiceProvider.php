<?php

namespace App\Providers;

use App\Domain\Repositories\BookingRepositoryInterface;
use App\Domain\Repositories\LoginRepositoryInterface;
use App\Domain\Repositories\PacketRepositoryInterface;
use App\Domain\Repositories\RegisterRespositoryInterface;
use App\Infrastructure\Repository\EloquentBookingRepository;
use App\Infrastructure\Repository\EloquentPacketRepository;
use App\Infrastructure\Repository\LoginRepositoryImpl;
use App\Infrastructure\Repository\RegisterRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RegisterRespositoryInterface::class, RegisterRepositoryImpl::class);
        $this->app->bind(LoginRepositoryInterface::class, LoginRepositoryImpl::class);
        $this->app->bind(BookingRepositoryInterface::class, EloquentBookingRepository::class);
        $this->app->bind(PacketRepositoryInterface::class, EloquentPacketRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
