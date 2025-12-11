<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Get cart items for current user
        $carts = Cart::with('product.productImages', 'product.store')
                    ->where('user_id', auth()->id())
                    ->get();

        // Calculate totals
        $subtotal = $carts->sum(function($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('user.checkout.index', compact('carts', 'subtotal'));
    }
}
