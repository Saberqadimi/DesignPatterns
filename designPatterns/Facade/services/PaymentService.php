<?php

namespace DesignPatterns\Facade\services;

class PaymentService
{
    public function processPayment($amount): string
    {
        return 'processPayment is worke amount equal : ' . $amount;
    }
}
