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
            <h1>заказы</h1>
    </div>
    @if($orders->isEmpty())
        <h1>No Orders</h1>
    @else
        <div class="my-grid-cols-3">
            <!-- Шапка таблицы -->
             <div class="my-grid-head">
                <div>Почта</div>
                <div>Сумма</div>
                <div class="end">Дата</div>
            </div>
            
            @foreach($orders as $order)
                <div class="my-grid-row" data-url="{{route('order.detailed',$order->id)}}">
                    <div >{{$order->email}}</div>
                    <div >{{$order->total}}</div>
                    <div class="end">{{$order->created_at->format('d.m.Y')}}</div> 
                </div>     
            @endforeach
        </div>
    @endif
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
</body>
</html>