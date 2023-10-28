<?php

use DesignPatterns\Adapter\PaymentGatewayAdapter;
use DesignPatterns\Adapter\PaymentGatewayInterface;
use DesignPatterns\Facade\EcommerceFacade;
use DesignPatterns\Factory\NotificationFactory;
use DesignPatterns\Strategy\PaymentService;
use DesignPatterns\Strategy\ZarinPalPaymentGateway;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::prefix('design-patterns')->group(function () {

    //facade
    Route::get('/facade', function () {

        $cartService = EcommerceFacade::getFacadeRoot()['cart']->addToCart(1, 4);

        $paymentService = EcommerceFacade::getFacadeRoot()['payment']->processPayment(26000);

        $notificationService = EcommerceFacade::getFacadeRoot()['notification']->sendNotification("ارسال ایمیل برای وریفای اکانت");

        return ['facadePattern' => [$cartService, $paymentService, $notificationService]];
    });

    //Adapter
    Route::get('/adapter', function () {
        //$gateway = new PaymentGatewayAdapter("payStar");
        $gateway = new PaymentGatewayAdapter("zarinpal");
        return ['AdapterPatter' => $gateway->processPayment(26000)];
    });

    //Singleton
    Route::controller(\App\Http\Controllers\CartController::class)->prefix('singleton')->group(function () {
        Route::get('/add', 'addToCart');  //design-patterns/singleton/add?product_id=6&quantity=5
        Route::get('/remove', 'removeFromCart');  //design-patterns/singleton/remove?product_id=6
        Route::get('/show', 'showCart');
    });

    //Factory
    Route::get('/factory', function () {
        $emailNotification = NotificationFactory::createNotification('email');
        $smsNotification = NotificationFactory::createNotification('sms');

        return [
            "emailNotification" => $emailNotification,
            'smsNotification' => $smsNotification,
        ];
    });

    //Strategy
    Route::get('/strategy', function () {
        $paymentGateway = new ZarinPalPaymentGateway();
        $paymentService = new PaymentService($paymentGateway);
        $pay = $paymentService->processPayment(100.00);

        return [
            "strategy-pattern" => $pay
        ];
    });



});
