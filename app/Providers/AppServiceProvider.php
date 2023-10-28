<?php

namespace App\Providers;

use DesignPatterns\Facade\services\CartService;
use DesignPatterns\Facade\services\NotificationService;
use DesignPatterns\Facade\services\PaymentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('ecommerce', function ($app) {
            return[
                'cart' => new CartService(),
                'payment' => new PaymentService(),
                'notification' => new NotificationService(),
            ];
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
