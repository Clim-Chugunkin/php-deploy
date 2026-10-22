@extends('admin.layouts.admin')
@section('title', 'Catalog')

@section('content')
    <h1>Каталог Админа</h1>
    <div class="admin-container">
        <!-- Заголовок -->
    <div class="table-header">Картинка</div>
    <div class="table-header">Модель</div>
    <div class="table-header">Цена</div>
    <div class="table-header">Остаток на складе</div>
    <div class="table-header"></div>
    
    @foreach($watches as $watch)
     <div class="admin-card" data-id="{{$watch->id}}" data-url="{{ route('watches.change', $watch->id) }}">
        <img src="{{$watch->image_url}}" class="admin-img">
        <h1>{{$watch->model}}</h1>
        <div class="admin-price">
            <p>{{$watch->price}}</p>
            <p>Р</p>
        </div>
        <p>{{$watch->stock}}</p>
        <form action="{{ route('watches.destroy', $watch->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот товар?');">
            @csrf
            @method('DELETE')
            
            <button type="submit" class="btn btn-danger" >
                Удалить товар
            </button>
        </form>
    </div>   
    @endforeach
    </div>
<script>
    document.querySelectorAll('.admin-card').forEach(card =>{
        card.addEventListener('click', (e) => {
            if (!(e.target.classList.contains('btn'))) {
                window.location.href = card.dataset.url;    
            }
            
        });  
    });
</script>
@endsection('content')