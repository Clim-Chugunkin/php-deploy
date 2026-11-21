@extends('admin.layouts.admin')
@section('title', 'Заказы')

@section('content')
<div class="main">
<h1 class="title-caption">Заказы</h1>
<div class="my-grid-cols-6-orders">
        <!-- Заголовок -->
    <div class="my-grid-head">
        <div>Номер</div>
        <div>Дата заказа</div>
        <div>Имя</div>
        <div>телефон</div>
        <div>Адресс</div>
        <div class="end">Сумма</div>
    </div>
    @foreach($orders as $order)
    <div class="my-grid-row" data-url="{{route('admin.order.detailed', $order->id)}}">
        <div> {{$order->id}}</div>
        <div>{{$order->created_at->format('d.m.Y')}}</div>    
        <div>{{$order->name}}</div>
        <div>{{$order->phone}}</div>
        <div>{{$order->address}}</div>
       
        <div class="end">{{$order->total}}</div>
    </div>  
    @endforeach
</div>    
</div>
    <script>
        document.querySelectorAll('.my-grid-row').forEach(card =>{
        card.addEventListener('click', (e) => {
            if (!(e.target.classList.contains('btn')) && 
                    (!(e.target.classList.contains('toggle-featured')))) {
                window.location.href = card.dataset.url;    
            }
            
        });  
    });    
    </script>
@endsection('content')