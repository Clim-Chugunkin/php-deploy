<!DOCTYPE html>
<html>
    <head>
        <title>TIMELESS</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
    <form action="{{route('order.confirm')}}" method="POST">
    @csrf
    <h1>Оформление заказа</h1>
    <div class="order-contacts">
    
    <div class="form-group">
        <label>Имя</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Телефон</label>
        <input type="text" name="phone" required>
    </div>

    <div class="form-group">
        <label>Почта</label>
        <input type="text" name="email" required>
    </div>

    <div class="form-group">
        <label>Адрес</label>
        <input type="text" name="address" required>
    </div>

    <div class="form-group">
        <label>Коментарии</label>
        <input type="text" name="comment" required>
    </div>

    <div class="form-group">
        <label>Способ оплаты</label>
         <!-- Вариант 1: Онлайн-оплата -->
        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
            <input type="radio" name="payment_method" value="online" class="mr-3" >
            <div>
                <span class="font-semibold block">Онлайн на сайте</span>
                <span class="text-xs text-gray-500">Банковская карта, СБП</span>
            </div>
        </label>

        <!-- Вариант 2: Оплата на месте -->
        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
            <input type="radio" name="payment_method" value="cash" class="mr-3" >
            <div>
                <span class="font-semibold block">При получении </span>
                <span class="text-xs text-gray-500">наличными или картой </span>
            </div>
        </label>
    </div>
    </div>

    <div class="curt-items-container">
        @foreach($cart->items as $item)
            <div class="curt-card">
                <img src="{{$item->watch->image_url}}" class="curt-img">
                <p>{{$item->watch->model}}</p>
                <p class="item-price">{{ number_format($item->watch->price, 0, '.', ' ') }} ₽</p>   
            </div>    
        @endforeach
    </div>
    <div class="curt-total">
        <div class="curt-nuber-total flex-row">
            <p>Всего товаров </p>
            <p id="amount">{{$cart->items->count()}}</p>
        </div>

        <div class="curt-price-total flex-row">
            <h2 class="curt-total-price">К оплате </h2>
            <p id="price">{{ number_format($cart->getTotalPrice(), 0, '.', ' ') }} ₽</p>
        </div>
        <button type="submit" class="form-send-btn">Отправить</button>
    </div>
</form> 
</body>
</html>