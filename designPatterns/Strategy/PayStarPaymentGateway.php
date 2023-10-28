<?php

namespace DesignPatterns\Strategy;

class PayStarPaymentGateway implements PaymentGatewayInterface
{
    public function processPayment($amount): string
    {
       return "processPayment called in PayStar  and amount equal : " . $amount;
    }
}
