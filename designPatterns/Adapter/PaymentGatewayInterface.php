<?php

namespace DesignPatterns\Adapter;

interface PaymentGatewayInterface
{
    public function processPayment($amount);
}
