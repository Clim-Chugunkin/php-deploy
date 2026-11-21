<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
<div class="main">
        <header class="nav-bar">     
                <div class="logo clickable" data-url="{{route('home')}}">
                    <h1>{{config('app.name')}}</h1>
                    <p>твой стиль.твое время</p>
                </div>
                <div class="find">
                    <input type="text" placeholder="Найти марку часов..." class="search-input">
                    <img src="{{ asset('images/find.jpeg') }}" width="36px" class="catalog-nav__find">
                </div>

                <div class="header-login">
                    <div class="icon-card {{ request()->routeIs('user.orders') ? 'active' : '' }}"  data-url="{{ route('user.orders')}}">
                        <img src="{{asset('images/orders.jpeg')}}">
                        <p>Заказы</p>                
                    </div>

                    <div class="icon-card {{ request()->routeIs('curt') ? 'active' : '' }}" data-url="{{ route('curt') }}">
                        <img src="{{asset('images/cart.jpeg')}}">
                        <p>Корзина</p>
                        <p id="cart-counter" class="cart-counter"></p>                
                    </div>

                    <div class="icon-card {{ request()->routeIs('user') ? 'active' : '' }}" data-url="{{route('user')}}">
                        <img src="{{asset('images/prof.jpeg')}}">
                        <p>Профиль</p>                
                    </div>

                </div>


                <button class="menu-toggle" id="toggle-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
        </header> 
        @yield('content') 
</div>


       
<body>
<script>
    // Создаем глобальный объект для конфигураций сайта
    window.AppConfig = {
        routes: {
            cartAdd: "{{ route('api.cart.add') }}",
            cartCount: "{{ route('api.cart.count') }}"
        }
    };
    document.querySelectorAll('.icon-card, .clickable').forEach(card =>{
        card.addEventListener('click', (e) => {
            if (!(e.target.classList.contains('btn')) && 
                    (!(e.target.classList.contains('toggle-featured')))) {
                window.location.href = card.dataset.url;    
            }
            
        });  
    });   
</script>
<script src="{{ asset('js/cart.js') }}"></script>   
</html>        