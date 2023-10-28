<?php

namespace DesignPatterns\Strategy;

interface PaymentGatewayInterface
{
    public function processPayment($amount);
}
