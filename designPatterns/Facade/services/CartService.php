<?php

namespace DesignPatterns\Facade\services;

class CartService
{
    public function addToCart($productId, $quantity)
    {
       return 'addToCart is work. ProductID : ' . $productId . ' Quantity : ' . $quantity;
    }
}
