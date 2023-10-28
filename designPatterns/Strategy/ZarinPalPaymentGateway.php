<?php

namespace DesignPatterns\Strategy;

class ZarinPalPaymentGateway implements PaymentGatewayInterface
{
    public function processPayment($amount): string
    {
       return "processPayment called in ZarinPal and amount equal : " . $amount;
    }
}
