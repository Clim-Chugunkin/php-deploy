@extends('admin.layouts.admin')
@section('title', 'Catalog')

@section('content')
<div class="main">
    <h1 class="title-caption">Каталог Админа</h1>
    <div class="my-grid-cols-6">
        <!-- Заголовок -->
        <div class="my-grid-head">    
            <div class="table-header center">Картинка</div>
            <div class="table-header ">Модель</div>
            <div class="table-header center">Остаток на складе</div>
            <div class="table-header center">Избранное</div>
            <div class="table-header end">Цена</div>
            <div class="table-header"></div>
        </div>
    
        @foreach($watches as $watch)
        <div class="my-grid-row" data-id="{{$watch->id}}" data-url="{{ route('watches.change', $watch->id) }}">
            <img src="{{$watch->image_url}}" class="center" >
            <div class=" ">{{$watch->model}}</div>
           
            <div class="center">{{$watch->stock}}</div>
            <div class="center"><input type="checkbox" class=" " data-id="{{$watch->id}}" {{$watch->featured ? 'checked' : ''}}></div>
            <div class="admin-price end">
                <p>{{$watch->price}}</p>
                <p>Р</p>
            </div>
            <form class="end" action="{{ route('watches.destroy', $watch->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот товар?');">
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-danger" >
                    <img class="img" src="{{asset('images/cart.jpeg')}}">
                     
                </button>
            </form>
            
        </div>   
        @endforeach
    </div>
</div>
    <script>
    // Создаем глобальный объект для конфигураций сайта
    window.AppConfig = {
        routes: {
            addToPop: "{{route('addToPop')}}",
        }
    };
    </script>
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection('content')