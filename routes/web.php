<?php

use DesignPatterns\Adapter\PaymentGatewayAdapter;
use DesignPatterns\Adapter\PaymentGatewayInterface;
use DesignPatterns\Facade\EcommerceFacade;
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
//        $gateway = new PaymentGatewayAdapter("payStar");
        $gateway = new PaymentGatewayAdapter("zarinpal");
        return ['AdapterPatter' => $gateway->processPayment(26000)];
    });


});
