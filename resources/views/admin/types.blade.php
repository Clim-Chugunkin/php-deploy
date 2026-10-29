@extends('admin.layouts.admin')
@section('title', 'Добавление/изменение товара')

@section('content')
<h1>Категории</h1>
    <div class="admin-container-types">
        <!-- Заголовок -->
    <div class="table-header">Картинка</div>
    <div class="table-header">Категория</div>
    <div class="table-header"></div>
    
    @foreach($types as $type)
     <div class="admin-card-type" data-id="{{$type->id}}" data-url="{{ route('types.change', $type->id) }}">
        <img src="{{$type->image_url}}" class="admin-img">
        <h1>{{$type->type}}</h1>
        <form action="{{ route('types.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот товар?');">
            @csrf
            @method('DELETE')
            
            <button type="submit" class="btn btn-danger" >
                Удалить категорию
            </button>
        </form>
    </div>   
    @endforeach
    </div>
<script>
    document.querySelectorAll('.admin-card-type').forEach(card =>{
        card.addEventListener('click', (e) => {
            if (!(e.target.classList.contains('btn'))) {
                window.location.href = card.dataset.url;    
            }
            
        });  
    });
</script>
@endsection('content')