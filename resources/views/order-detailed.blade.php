<!DOCTYPE html>
<html>
    <head>
        <title>TIMELESS</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>    
<h1>Заказ {{$order->email}}</h1>
<div class="admin-container">
    <div class="table-header">Имя</div>
    <div class="table-header">телефон</div>
    <div class="table-header">почта</div>
    <div class="table-header">Адресс</div>
    <div class="table-header">Комментарий</div>
    <div class="table-header">Сумма заказа</div>
    <div class="admin-card">
        <h1>{{$order->name}}</h1>
        <h1>{{$order->phone}}</h1>
        <h1>{{$order->email}}</h1>
        <h1>{{$order->address}}</h1>
        <h1>{{$order->comment}}</h1>
        <h1>{{$order->total}}</h1>
    </div>

   

    
</div>
<h1>Товары</h1>
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

</body>
<script>
            document.querySelectorAll('.my-grid-row').forEach(card=>{
              card.addEventListener('click',(e)=>{
                if (!(e.target.classList.contains('btn'))) {
                window.location.href = card.dataset.url;    
                }
              });
            });
</script>
</html>