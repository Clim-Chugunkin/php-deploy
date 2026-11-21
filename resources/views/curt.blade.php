@extends('app')
@section('title', 'Корзина')

@section('content')
<h1 class="title-caption">Корзина</h1>
    @if(!$cart || $cart->items->isEmpty())
        <h1 class="title-caption">The curt is empty</h1>
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
                    <p id="amount">{{$cart->items->count()}}</p>
                </div>

                <div class="curt-price-total flex-row">
                    <h2 class="curt-total-price">К оплате </h2>
                    <p id="price">{{ number_format($cart->getTotalPrice(), 0, '.', ' ') }} ₽</p>
                </div>
                 
                <a href="{{route('order.checkout')}}" class="btn-pay">Перейти к оформлению</a>
            </div> 
        </div>  
    @endif
@endsection('content')