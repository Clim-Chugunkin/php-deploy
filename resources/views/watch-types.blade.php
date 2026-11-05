@extends('app')
@section('content')
<div class="catalog-content">
        <div class="cards">
            @foreach($watches as $watch)
                    <div class="card" data-id="{{$watch->id}}" data-url="/watches/{{$watch->id}}">
                        <img src="{{$watch->image_url}}">
                        <h1>{{$watch->model}}</h1>
                        <div class="price">
                            <p>{{$watch->price}}</p>
                            <p>Р</p>
                        </div>
                        <button class="garbidge">В корзину</button>
                    </div>        
            @endforeach
        </div>
</div>
<script type="text/javascript">
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', (e) => {
        
            // Проверяем: если клик пришелся на кнопку с классом .garbidge
            if (e.target.classList.contains('garbidge')) {
                const productId = card.dataset.id;
                console.log('Кликнули на кнопку! ID:', productId);
                // Передаем для записи в корзину
                fetch("{{ route('api.cart.add') }}", {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json', 
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ 
                        product_id: productId
                    }),
                    credentials: 'include' 
                })
                .then(response => response.json()) 
                .then(data => {
                    const counter = document.getElementById('cart-counter');
                    if (counter) {
                        counter.textContent = data.count;
                    }
                })
                .catch(error => console.error('Ошибка:', error)); 
            }else{
            // Если кликнули в любое другое место карточки — переходим
            window.location.href = card.dataset.url;

            }
            
        });
});
</script>
@endsection('content')
