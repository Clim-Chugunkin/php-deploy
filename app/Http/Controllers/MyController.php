<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Watch;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Type;
use App\Models\FeaturedWatch;


class MyController extends Controller
{
    //
    public function index(){
        return "Hello world";
    }

    public function getAllUsers(){
        $query = User::query();
        
        $users=$query->get();
        return view('users',compact('users'));
    }

    public function home(){
        $watches = Watch::all();
        $bannerWatch = $watches->firstWhere('id', 39);
        $types = Type::all();

        $featuredWatches = FeaturedWatch::all();
        return view('home',compact('watches','bannerWatch','types','featuredWatches'));
    }

    public function getWatchById($id){
        $watch = Watch::findOrFail($id);
        return view('watch',compact('watch'));
    }

    public function getCartItems(){
        $cart = null;

        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
        } else {
            $cart = Cart::where('session_id', session()->getId())->first();
        }

        // Если корзина не найдена, количество равно 0
        if (!$cart) {
            return response()->json(['count' => 0, 'positions' => 0]);
        }

        // Сумма всех количеств (quantity) товаров
        $totalQuantity = $cart->items()->sum('quantity');
        
        // Количество уникальных позиций (разных моделей часов)
        $uniquePositions = $cart->items()->count();

        return response()->json([
            'count' => $totalQuantity,       // Всего штук часов
            'positions' => $uniquePositions  // Всего разных моделей
        ]);
    }

    public function addToCurt(Request $request){
        $productId = $request->product_id;
        
        $cart = null;

        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
            if (!$cart){
                //создаем крозину для user_id
                $cart = Cart::create([
                    'user_id' => auth()->id(),
                ]);
            }
        } else {
            $cart = Cart::where('session_id', session()->getId())->first();
            if (!$cart){
                //создаем корзину для session_id
                $cart = Cart::create([
                    'session_id' => session()->getId()
                ]);
            }
        }
         
        
        CartItem::create([
            'cart_id'=>$cart->id,
            'watch_id'=>$productId,
        ]);
        
        return response()->json([
            'count'=>$cart->items()->sum('quantity')
        ]);
    }

    public function getCurt(){

        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
        } else {
            $cart = Cart::where('session_id', session()->getId())->first();
        }

        return view('curt',compact('cart'));
    }

    public function curtRemove($id){
       // Метод findOrFail автоматически вернет ошибку 404, если такого ID нет (защита от взлома).
       $cartItem = CartItem::findOrFail($id);

       // 2. Дополнительная проверка безопасности (опционально, но рекомендуется):
       // Проверяем, принадлежит ли эта запись текущему авторизованному пользователю
       if ($cartItem->cart->user_id !== auth()->id()) {
           abort(403, 'У вас нет прав для удаления этого товара');
       }

       // 3. Вызываем метод удаления из базы данных
       $cartItem->delete();

       // 4. Перенаправляем пользователя обратно на страницу корзины
       return redirect()->back()->with('success', 'Товар успешно удален'); 
    }
}
