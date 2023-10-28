<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use DesignPatterns\SingleTon\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->input('quantity', 1);

        $cartService = CartService::getInstance();

        return ['cartItems' => $cartService->addItem($productId, $quantity)];
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->product_id;

        $cartService = CartService::getInstance();

        return $cartService->removeItem($productId);
    }

    public function showCart()
    {
        $cartService = CartService::getInstance();
        return $cartService->getItems();
    }
}
