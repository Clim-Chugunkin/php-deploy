@extends('app')
@section('title', 'Оформление заказа')
@section('content')
<h1 class="title-caption">Оформление заказа</h1>
    
    <form class="form-checkout" action="{{route('order.confirm')}}" method="POST">
    @csrf
    
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
    <button type="submit" class="form-send-btn">Отправить</button>
    </div>
</form>
<h2 class="title-caption">Товары</h2> 
<div class="my-grid-cols-3">
    <div class="my-grid-head">
        <div class="center">Картинка</div>
        <div>Модель</div>
        <div class="end">Цена</div>
    </div>
    @foreach($cart->items as $item)
        <div class="my-grid-row">
            <img src="{{$item->watch->image_url}}" class="center">
            <p>{{$item->watch->model}}</p>
            <p class="end">{{ number_format($item->watch->price, 0, '.', ' ') }} ₽</p>   
        </div>    
    @endforeach
</div>
<div class="curt-total">
    <div class="curt-nuber-total flex-row">
        <p>Всего товаров </p>
        <p id="amount">{{$cart->items->count()}}</p>
    </div>

    <div class="curt-price-total flex-row">
        <h2 class="curt-total-price ">К оплате </h2>
        <p id="price" class="bold">{{ number_format($cart->getTotalPrice(), 0, '.', ' ') }} ₽</p>
    </div>
</div>
@endsection('content')