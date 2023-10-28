<?php

namespace DesignPatterns\Singleton;

use Illuminate\Support\Facades\Cache;

class CartService
{
    private static $instance = null;
    private $cartItems = [];

    private function __construct()
    {
        $this->cartItems = Cache::get('cartItems', []); // Initialize with an empty array if cache is empty.
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new CartService();
        }

        return self::$instance;
    }

    public function addItem($productId, $quantity = 1)
    {
        if (isset($this->cartItems[$productId])) {
            $this->cartItems[$productId] += $quantity;
        } else {
            $this->cartItems[$productId] = $quantity;
        }

        // Update the cache with the new cart items.
        Cache::put('cartItems', $this->cartItems);

        return $this->getItems();
    }

    public function removeItem($productId)
    {
        if (isset($this->cartItems[$productId])) {
            unset($this->cartItems[$productId]);
            $message = "Product with ID " . $productId . " removed from the cart.";
        } else {
            $message = "Product with ID " . $productId . " not found in the cart.";
        }

        // Update the cache with the updated cart items.
        Cache::put('cartItems', $this->cartItems);

        return [
            "message" => $message,
            "items" => $this->getItems()
        ];
    }

    public function getItems()
    {
        return $this->cartItems;
    }
}
