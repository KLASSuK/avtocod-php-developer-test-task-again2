<?php

namespace App\Providers;

use App\Services\AvatarService\AvatarServiceInterface;
use App\Services\AvatarService\GravatarService;
use App\Services\AvatarService\PrAvatarService;
use Illuminate\Support\ServiceProvider;

class AvatarServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //        $this->app->bind(AvatarServiceInterface::class, GravatarService::class);
        $this->app->bind(AvatarServiceInterface::class, PrAvatarService::class);
    }
}
