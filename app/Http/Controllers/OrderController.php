<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Mail\OrderSuccessToAdmin;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class OrderController extends Controller
{
    public function checkoutPage()
    {
        return view('cart.checkout');
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'user_surname' => 'required',
            'user_name' => 'required',
        ]);

        try {
            $cart = auth()->user()->cart;
    
            $order = Order::add($request->all());
    
            foreach ($cart->items as $item) {
                OrderItem::add($item, $order);
            }
    
            $order->total_sum = $cart->getTotalPrice();
            $order->save();
            foreach($cart->items as $item){
               $product = Product::find($item->product->id);
               $product->update(["quantity"=>$product->quantity - $item->quantity]);
            }

            $cart->delete();

            Mail::to($order->email)->send(new OrderShipped($order));
            Mail::to('rogov_p.a@mail.ru')->send(new OrderSuccessToAdmin($order));
        } catch (Throwable $e) {
            report($e);
            return false;
        }

        return redirect()->route('app.order-thankyou', $order);
    }

    public function thankyouPage(Order $order)
    {
        return view('cart.order-thankyou', [
            'order' => $order,
            'orders' => Order::all()->sortByDesc('created_at')
        ]);
    }

    public function orders()
    {
        return view('orders.index', [
            'orders' =>auth()->user()-> orders,
        ]);
    }

}
