@extends('admin.layouts.admin')
@section('title', 'Добавление/изменение товара')

@section('content')
   
    @if(empty($watch))
        <h1>Добавление товара</h1>
    @else
        <h1>Изменение товара</h1>
    @endif    

    <div class="catalog-container">

    <form action="{{ isset($watch) ? route('watches.update', $watch->id) : route('addWatch') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    @if(isset($watch))
        @method('PUT')
    @endif

    <!-- Основные поля (Название, Цена и т.д.) -->

    <div class="form-group">
        <label>Название модели</label>
        <input type="text" name="model" required value="{{ $watch?->model ?? old('model') }}">
    </div>

    <div class="form-group">
        <label>Бренд</label>
        <input type="text" name="brand" required value="{{$watch?->brand ?? old('brand')}}">
    </div>

    <div class="form-group">
        <label>Категория</label>
        <select id="type" name="type_id">
        <option value="">-- Не выбрано --</option>
        @foreach($types as $type)
            <option value="{{$type->id}}" @selected(isset($watch) && $watch->type_id == $type->id)>{{$type->type}}</option>
        @endforeach
    
        </select>
    </div>

    <div class="form-group">
        <label>Цена (₽)</label>
        <input type="number" name="price" step="0.01" min="0" required placeholder="Введите цену часов" value="{{$watch?->price ?? old('price')}}">
    </div>

    <div class="form-group mb-3">
    <label class="main-label">Главное изображение часов</label>
    
    <!-- Переносим id="watch-image" на сам инпут -->
    <label class="file-upload-label">
        <span class="upload-btn-text">📁 Выберите файл изображения</span>
        <input type="file" name="image" accept="image/*" class="file-input-hidden" id="watch-image">
    </label>
    
    <div class="mt-2">
        <img id="image-preview" src="{{$watch?->image_url ?? old('image')}}" alt="Превью" style="max-width: 150px; max-height: 150px;display: block; border: 1px solid #ddd; padding: 5px; border-radius: 4px;">
    </div>

</div>


    <div class="specs-container">
        
    <div class="specs" id="specs">
        {{-- Безопасно получаем массив или пустой массив, если $watch равен null --}}
        @php $specs = $watch?->specs ?? []; @endphp

        @if(is_array($specs))
            @foreach($specs as $key => $value)
                <div class="spec">
                    <input type="text" name="specs[{{ $loop->index }}][key]" value="{{ $key }}">
                    <input type="text" name="specs[{{ $loop->index }}][value]" value="{{ $value }}">          
                </div>
            @endforeach
        @endif

        {{-- count() вернет 0, если массив пустой, или верный следующий индекс --}}
        <div class="spec">
            <input type="text" name="specs[{{ is_array($specs) ? count($specs) : 0 }}][key]" placeholder="Введите характеристику">
            <input type="text" name="specs[{{ is_array($specs) ? count($specs) : 0 }}][value]" placeholder="Введите значение">
        </div>
    </div>


        <button type="button" id="btn-add">+</button>
    </div>
        <button type="submit" class="form-send-btn">Отправить</button>
    </form>

    </div>
<script src="{{ asset('js/watches.js') }}"></script>
@endsection('content')