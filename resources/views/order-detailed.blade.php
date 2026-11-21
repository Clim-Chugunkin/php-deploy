@extends('app')
@section('title', 'Заказы')

@section('content')
<div class="main">    
<h1 class="title-caption">Заказ №{{$order->id}}</h1>
<div class="my-grid-cols-6-user-orders">
    <div class="my-grid-head">
        <div>Имя</div>
        <div>телефон</div>
        <div>почта</div>
        <div>Адресс</div>
        <div>Комментарий</div>
        <div>Итог</div>
    </div>
    <div class="my-grid-row">
        <div>{{$order->name}}</div>
        <div>{{$order->phone}}</div>
        <div>{{$order->email}}</div>
        <div>{{$order->address}}</div>
        <div>{{$order->comment}}</div>
        <div>{{$order->total}}</div>
    </div>
</div>
<h1 class="title-caption">Товары</h1>
    <div class="my-grid-cols-3">
        <div class="my-grid-head">
                <div>иконка</div>
                <div>Модель</div>
                <div class="end">Сумма</div>
        </div>
        @foreach($order->items as $item)
            <div class="my-grid-row" data-url="{{route('watch.details',$item->watch->id)}}">
                <img src="{{$item->watch->image_url}}">
                <div>{{$item->watch->model}}</div>
                <div class="end">{{$item->price}}</div>
            </div>
        @endforeach

    </div>
</div>    
<script>
            document.querySelectorAll('.my-grid-row').forEach(card=>{
              card.addEventListener('click',(e)=>{
                if (!(e.target.classList.contains('btn'))) {
                window.location.href = card.dataset.url;    
                }
              });
            });
</script>
@endsection('content')