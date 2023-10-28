<?php

namespace DesignPatterns\Adapter\Gateways;

class ZarinPalGateway
{
    public function makePayment($totalAmount)
    {
       return "zarinPal gateway called and totalAmount for Pay : (" . $totalAmount . " Toman)";
    }
}
