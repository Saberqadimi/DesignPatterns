<?php

namespace DesignPatterns\Adapter;

use DesignPatterns\Adapter\Gateways\ZarinPalGateway;

class PaymentGatewayAdapter implements PaymentGatewayInterface
{
    protected $paymentGateway;

    public function __construct($paymentGateway)
    {
       $gateway = __NAMESPACE__ . '\\Gateways\\' . ucfirst($paymentGateway) . 'Gateway';
       $this->paymentGateway =  resolve($gateway);
    }

    public function processPayment($amount)
    {
       return $this->paymentGateway->makePayment($amount);
    }

}
