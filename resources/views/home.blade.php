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
                    <h1>timeless</h1>
                    <p>fashion</p>
                </div>
                <div class="menu" id="main-menu">
                    <ul class="menu-list">
                        <li><a href="#">Мужские</a></li>
                        <li><a href="#">Женские</a></li>
                        <li><a href="#">Детские</a></li>
                        <li><a href="#">Аксесуары</a></li>
                    </ul>
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
                        <img src="{{ asset('images/bag.jpeg') }}" width="24px">
                        <p>12 530</p>
                    </div>
                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Выйти</button>
                        </form>
                    @endauth

                </div>


                <button class="menu-toggle" id="toggle-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
        </header>
        <div class="container">
            <h1 class="back-caption">Амфибия 2403</h1>
            <div class="cover">
            <img src="{{Storage::url('watches/watch5.png')}}" class="img-watch">
            <div class="info">
                <h1>Часы  восток <br> амфибия 2403</h1>
                <span></span>
                <div class="price">
                    <p>9 800</p>
                    <p>Р</p>
                </div>
                <div class="feature">
                    <div class="item">
                        <p>Материалы:</p>
                        <p>Нержавеющая сталь/латунь/кожа.</p>
                    </div>
    
                    <div class="item">
                        <p>Опции:</p>
                        <p>Пылевлагозащита, Противоударные</p>
                    </div>
    
                    <div class="item">
                        <p>Габариты:</p>
                        <p>D 37 мм<br>
                            H 11,7 мм</p>
                    </div>
     
                    <div class="item">
                        <p>Габариты:</p>
                        <p>D 37 мм<br>
                            H 11,7 мм</p>
                    </div>
                </div>
                <button class="garbidge">В корзину</button>
            </div>
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
        <h1 class="catalog">Каталог</h1>
        <div class="find">
            <input type="text" placeholder="Найти марку часов..." class="search-input">
            <img src="images/find_m.png" width="36px" class="catalog-nav__find">
        </div>
        <div class="catalog-content">
        <div class="catalog-nav">    
            <ul class="catalog-nav__watch">
                <li><a href="#" class="selected">Амфибия</a></li>
                <li><a href="#">Командирские</a></li>
                <li><a href="#">Восток</a></li>
                <li><a href="#">Атташе</a></li>
                <li><a href="#">Ретро</a></li>
            </ul>
        </div>
        <div class="cards">
            @foreach($watches as $watch)
                <div class="card">
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
</script>
</html>
