@extends('admin.layouts.admin')
@section('title', 'Заказы')

@section('content')
<h1>Заказ {{$order->email}}</h1>
<div class="admin-container">
    <div class="table-header">Имя</div>
    <div class="table-header">телефон</div>
    <div class="table-header">почта</div>
    <div class="table-header">Адресс</div>
    <div class="table-header">Комментарий</div>
    <div class="table-header">Сумма заказа</div>
    <div class="admin-card" data-url="{{route('admin.order.detailed', $order->id)}}">
        <h1>{{$order->name}}</h1>
        <h1>{{$order->phone}}</h1>
        <h1>{{$order->email}}</h1>
        <h1>{{$order->address}}</h1>
        <h1>{{$order->comment}}</h1>
        <h1>{{$order->total}}</h1>
    </div>
</div>

@foreach($order->items as $item)
    <div class="admin-card">
        <h1>{{$item->watch->model}}</h1>
        <h1>{{$item->price}}</h1>    
    </div>
@endforeach

@endsection('content')