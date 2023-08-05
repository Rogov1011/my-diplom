<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {

        $currentUser = auth()->user();
        $args = [];
        if ($currentUser) {
            $args['user_id'] = $currentUser->id;
        }

        $cart = $currentUser->cart;

        if (!$cart) {
            $cart = Cart::create($args);
        }

        $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

        // if (!$cartItem) {
            $cartItem = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'price' => $product->price,
                'sub_total' => $product->price
            ]);
        // } else {
        //     $cart->update([
        //         'quantity' => $cartItem->quantity + 1
        //     ]);
        //     $cartItem->setSubTotal();
        // }

        // $cart->setTotalPrice();

        return response()->json([
            'qty' => $cart->items->count(),
            'success' => 'Товар"' . $product->title . '"добавлен в корзину'
        ]);
    }

    public function cartPage()
    {
        return view('cart.cart', [
            'cart' => auth()->user()->cart
        ]);
    }

    public function changeQty(Request $request, CartItem $item)
    {
        $item->update(['quantity' => $request->input('quantity')]);
        $item->setSubTotal();
        $item->cart->setTotalPrice();
        return back();
    }
    public function destroy(CartItem $item)
    {
        $cart = $item->cart;
        $item->delete();

        if (!$cart->items->count()) {
            $cart->delete();
        } else {
            $cart->setTotalPrice();
        }

        return back();
    }
}
