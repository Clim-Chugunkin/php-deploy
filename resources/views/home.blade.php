@extends('app')
@section('content')
<div class="container">
            <h1 class="back-caption">{{$bannerWatch->model}}</h1>
            <div class="cover">
            <img src="{{$bannerWatch->image_url}}" class="img-watch" data-url="/watches/{{$bannerWatch->id}}" >
            <div class="info" data-id="{{$bannerWatch->id}}" data-url="/watches/{{$bannerWatch->id}}">
                <h1>{{$bannerWatch->brand}} <br> {{$bannerWatch->model}}</h1>
                <span></span>
                <div class="price">
                    <p>{{$bannerWatch->price}}</p>
                    <p>Р</p>
                </div>
                <div class="feature">
                    <div class="item">
                        <p>Механизм:</p>
                        <p>{{$bannerWatch->specs['mechanism']}}</p>
                    </div>
    
                    <div class="item">
                        <p>Стекло:</p>
                        <p>{{$bannerWatch->specs['glass']}}</p>
                    </div>
    
                    <div class="item">
                        <p>Материал:</p>
                        <p>{{$bannerWatch->specs['case_material']}}</p>
                    </div>
     
                    <div class="item">
                        <p>Запас хода:</p>
                        <p>{{$bannerWatch->specs['power_reserve']}}</p>
                    </div>
                </div>
                <button class="garbidge">В корзину</button>
            </div>
            </div>
        </div>
        <div class="types">
            @foreach($types as $type)
                <div class="type-card" data-url="/watches/sorted/types/{{$type->slug}}">
                    <img src="{{ $type->image_url}}" class="type-img">
                    <p>{{$type->type}}</p>
                </div>
            @endforeach
    
        </div>
        
        <h1 class="catalog">Популярные</h1>
        <div class="catalog-content">
        <div class="cards">
            @foreach($featuredWatches as $watch)
                    <div class="card" data-id="{{$watch->watch->id}}" data-url="/watches/{{$watch->watch->id}}">
                        <img src="{{$watch->watch->image_url}}">
                        <h1>{{$watch->watch->model}}</h1>
                        <div class="price">
                            <p>{{$watch->watch->price}}</p>
                            <p>Р</p>
                        </div>
                        <button class="garbidge">В корзину</button>
                    </div>        
            @endforeach
        </div>

        </div>
        <div class="advants">
            <div class="advant">
                <h1>14</h1>
                <p>Возврат без причины в течение 14 дней</p>
            </div>

            <div class="advant">
                <h1>15</h1>
                <p>15 лет гарантии и сервисной поддержки</p>
            </div>

            <div class="advant">
                <h1>РСТ</h1>
                <p>Вся часы полностью сертифицированы</p>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
        (function(){
            var button = document.getElementById('toggle-menu');
            button.addEventListener('click',function(event){
                event.preventDefault();
                var menu = document.getElementById('main-menu');
                menu.classList.toggle('is-open');
            });
        })();
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.type-card').forEach(card => {
                card.addEventListener('click', (e) => {
                    window.location.href = e.currentTarget.dataset.url;
                });
            });
        });


        document.querySelectorAll('.card, .info, .img-watch').forEach(card => {
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
                    alert("Товар добавлен в корзину");
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