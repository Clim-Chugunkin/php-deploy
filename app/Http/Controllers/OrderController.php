<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderCreateNotification;
use Illuminate\Support\Facades\Notification;



class OrderController extends Controller
{
    //
    public function checkout(){

        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
        } else {
            $cart = Cart::where('session_id', session()->getId())->first();
        }
        return view('order-check',compact('cart'));
    }

    public function confirm(Request $request){
        $validationRules = [ 'name' =>'required|string|max:255',
                             'phone' => 'required|string|max:255',
                             'email' => 'required|string|max:255',
                             'payment_method' => 'required|in:online,cash',
                             'comment' => 'max:255',
                             'address' => 'required|max:255'

        ];

        $validated = $request->validate($validationRules);
        
        // берем корзину
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
            
        } else {
            $cart = Cart::where('session_id', session()->getId())->first();
        }
        //если корзина пуста
        if (!$cart || $cart->items->isEmpty()) {
            return; //redirect()->route('cart.index')->with('error', 'Ваша корзина пуста');
        }

        $validated['user_id'] = auth()->id();
        $validated['total'] = $cart->getTotalPrice();
        
        //открываем транзакцию для безопаности
        try{
            $order = DB::transaction(function() use ($validated, $cart){
                $order = Order::create($validated);
    
                //перезаписываем из корзины в заказ
                foreach ($cart->items as $item){
                    $order->items()->create([
                        'watch_id' => $item->watch_id,
                        'price' => $item->watch->price
                    ]);
                } 
                //удаляем все из корзины
                $cart->delete();
                return $order;
            });
            Notification::route('mail', $order->email)
                    ->notify(new OrderCreateNotification($order));
            return redirect()->route('home');
        }catch (Throwable $e) {
            return redirect()->back()
            ->withInput() // Сохраняет введенные пользователем данные в инпутах, чтобы не писать заново
            ->with('error', 'Произошла непредвиденная ошибка при сохранении заказа. Пожалуйста, попробуйте позже.');
        }
    }

    public function getAllOrders(){
        $orders = Order::orderBy('created_at','desc')->get();
        return view('admin.orders',compact('orders'));
    }

    public function getOrderDetailed(Order $order){
        return view('admin.order-detailed', compact('order'));
    }

    public function userOrders(){
        if (auth()->check()) {
            $orders = Order::where('user_id', auth()->id())
                            ->orderBy('created_at','desc')
                            ->get();
            
        } else {
            return redirect()->route('home');
        }

        return view('orders', compact('orders'));

    }

    public function getDetailedOrder(Order $order){
        return view('order-detailed', compact('order'));
    }
}
