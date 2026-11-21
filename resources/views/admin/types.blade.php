@extends('admin.layouts.admin')
@section('title', 'Добавление/изменение товара')

@section('content')
<div class="main">
<h1 class="title-caption">Категории</h1>
    <div class="my-grid-cols-3">
        <!-- Заголовок -->
    <div class="my-grid-head">
        <div>Картинка</div>
        <div>Категория</div>
        <div class="end"></div>
    </div>
    @foreach($types as $type)
     <div class="my-grid-row" data-id="{{$type->id}}" data-url="{{ route('types.change', $type->id) }}">
        <img src="{{$type->image_url}}" class="admin-img">
        <div>{{$type->type}}</div>
        <form class="end" action="{{ route('types.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот товар?');">
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
    document.querySelectorAll('.my-grid-row').forEach(card =>{
        card.addEventListener('click', (e) => {
            if (!(e.target.classList.contains('img'))) {
                window.location.href = card.dataset.url;    
            }
            
        });  
    });
</script>
@endsection('content')