@extends('app')
@section('title', 'Профиль')

@section('content')
<h1 class="title-caption">Профиль</h1>
@if(!$user)
        <h1 class="title-caption">Необходима регистрация</h1>
    @else
    <div class="user-card">
        <img src="{{asset('images/login.png')}}">
        <div class="my-grid-cols-2-prof">
            <div class="my-grid-row">
                <div class="bold">Имя:</div>
                <div>{{$user->name}}</div>
            </div>
            <div class="my-grid-row">
                <div class="bold">Почта:</div>
                <div>{{$user->email}}</div>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="garbidge btn-logout">Выход</button>
        </form>
    </div>
    
@endif 

@endsection('content')