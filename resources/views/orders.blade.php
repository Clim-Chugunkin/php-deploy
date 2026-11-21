@extends('app')
@section('title', 'Заказы')

@section('content')
<h1 class="title-caption">Заказы</h1>
@if($orders->isEmpty())
        <h1>No Orders</h1>
    @else
        <div class="my-grid-cols-3">
            <!-- Шапка таблицы -->
             <div class="my-grid-head">
                <div class="">Дата</div>
                <div>Почта</div>
                <div class="end">Сумма</div>      
            </div>
            
            @foreach($orders as $order)
                <div class="my-grid-row" data-url="{{route('order.detailed',$order->id)}}">
                    <div class="">{{$order->created_at->format('d.m.Y')}}</div>    
                    <div >{{$order->email}}</div>
                    <div class="end">{{$order->total}}</div> 
                </div>     
            @endforeach
        </div>
    @endif
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