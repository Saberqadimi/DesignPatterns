<?php

namespace DesignPatterns\Adapter\Gateways;

class PayStarGateway
{
    public function makePayment($totalAmount)
    {
       return "PayStar  gateway called and totalAmount for Pay : (" . $totalAmount . " Toman)";
    }
}
