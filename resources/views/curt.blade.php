<!DOCTYPE html>
<html>
    <head>
        <title>TIMELESS</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body class="curt-body">
    <div class="curt-header">
            <!-- Ссылка возврата в каталог -->
            <a  href="/" id="back-link" class="back-link">← Вернуться в каталог</a>
            <h1>Корзина</h1>
    </div>
    @if(!$cart || $cart->items->isEmpty())
        <h1>The curt is empty</h1>
    @else
        <div class="curt-container">
            <div class="curt-items-container">
                @foreach($cart->items as $item)
                    <div class="curt-card">
                        <img src="{{$item->watch->image_url}}" class="curt-img">
                        <p>{{$item->watch->model}}</p>
                        <p class="item-price">{{ number_format($item->watch->price, 0, '.', ' ') }} ₽</p>
                        {{-- Кнопка удаления товара --}}
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" title="Удалить из корзины">
                                &times; {{-- Символ крестика --}}
                            </button>
                        </form>    
                    </div>    
                @endforeach
            </div>
            <div class="curt-total">

                <div class="curt-nuber-total flex-row">
                    <p>Всего товаров </p>
                    <p id="amount">2</p>
                </div>

                <div class="curt-price-total flex-row">
                    <h2 class="curt-total-price">К оплате </h2>
                    <p id="price">{{ number_format($cart->getTotalPrice(), 0, '.', ' ') }} ₽</p>
                </div>
                 
                <button class="btn-pay">
                    Перейти к оформлению 
                </button>
            </div>   
    @endif
</div>    
</body>
</html>