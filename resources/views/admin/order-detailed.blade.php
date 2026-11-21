@extends('admin.layouts.admin')
@section('title', 'Заказы')

@section('content')
<div class="main">
<h1 class="title-caption">Заказ № {{$order->id}}</h1>

<h2 class="title-caption">Товары</h2> 
    <div class="my-grid-cols-3">
        <div class="my-grid-head">
                <div class="center">иконка</div>
                <div>Модель</div>
                <div class="end">Сумма</div>
        </div>
        @foreach($order->items as $item)
            <div class="my-grid-row" data-url="{{route('watch.details',$item->watch->id)}}">
                <img src="{{$item->watch->image_url}}" class="center">
                <div>{{$item->watch->model}}</div>
                <div class="end">{{$item->price}}</div>
            </div>
        @endforeach
    </div>
    <div class="my-grid-cols-3">
        <div class="my-grid-row">
            <div class="end bold">Итог:</div>
            <div></div>
            <div class="end bold">{{$order->total}}</div>
        </div>
    </div>
    <div class="my-grid-cols-3">
        <div class="my-grid-row">
            <div class="end bold">Коментарии:</div>
            <div></div>
            <div class="end">{{$order->comment}}</div>
        </div>
    </div>

</div>   
    
@endsection('content')