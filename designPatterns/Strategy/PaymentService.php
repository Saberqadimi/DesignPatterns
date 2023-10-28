<?php

namespace DesignPatterns\Strategy;

class PaymentService
{
    private PaymentGatewayInterface $paymentGateway;

    public function __construct(PaymentGatewayInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function processPayment($amount)
    {
        return $this->paymentGateway->processPayment($amount);
    }
}
