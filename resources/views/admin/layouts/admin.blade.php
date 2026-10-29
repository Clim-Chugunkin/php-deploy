<!DOCTYPE html>
<html>
    <head>
      <title>@yield('title')</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
   <nav class="admin-panel"> 
        @if(session('success'))
            <div class="messages">
                <a href="{{route('mainAdminPage')}}">&#11164 {{session('success')}}</a>
            </div>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
        @endif    
        
        <ul class="admin-menu">
            <li>
                <a href="{{ route('mainAdminPage') }}" class="{{ request()->routeIs('mainAdminPage') ? 'active' : '' }}">Главная</a>
            </li>
            <li>
                <a href="#" class="{{ request()->routeIs('orders.*') ? 'active' : '' }}">Заказы</a> 
            </li>
            <li>
                <a href="{{ route('createForm') }}" class="{{ request()->routeIs('createForm') ? 'active' : '' }}">Добавить товар</a>
            </li>
            <li>
                <a href="{{ route('getAllTypes') }}" class="{{ request()->routeIs('getAllTypes') ? 'active' : '' }}">Категории</a>
            </li>
            <li>
                <a href="{{ route('createFormType') }}" class="{{ request()->routeIs('createFormType') ? 'active' : '' }}">Добавить категорию</a>
            </li>

        </ul>
    </nav>
   @yield('content')   
</body>
</html>