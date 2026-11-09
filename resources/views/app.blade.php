<!DOCTYPE html>
<html>
    <head>
        <title>TIMELESS</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
<div class="main">
        <header class="nav-bar">     
                <div class="logo">
                    <h1>toki.ru</h1>
                    <p>твой стиль.твое время</p>
                </div>
                <div class="find">
                    <input type="text" placeholder="Найти марку часов..." class="search-input">
                    <img src="{{ asset('images/find.jpeg') }}" width="36px" class="catalog-nav__find">
                </div>
                <div class="header-login">
                    @guest
                    <a href="{{route('login')}}" class="login">
                    <div class="login bag">
                        <img src="{{ asset('images/login.png') }}" width="24px">
                        <p>Вход</p> 
                    </div>
                    </a>
                    @endguest
                    @auth
                        <p class="user-name">Привет,{{ auth()->user()->name }}!</p>
                       
                    @endauth  
                    <div class="bag">
                        <a href="{{route('curt')}}"><img src="{{ asset('images/bag.jpeg') }}" width="24px"></a>
                        <p id="cart-counter">0</p>
                    </div>
                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-logout">Выход</button>
                        </form>
                    @endauth

                </div>


                <button class="menu-toggle" id="toggle-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
        </header>
        @yield('content')
       
<body>
<script>
    // Создаем глобальный объект для конфигураций сайта
    window.AppConfig = {
        routes: {
            cartAdd: "{{ route('api.cart.add') }}",
            cartCount: "{{ route('api.cart.count') }}"
        }
    };
</script>
<script src="{{ asset('js/cart.js') }}"></script>   
</html>        