@extends('admin.layouts.admin')
@section('title', 'Добавление/изменение категории')

@section('content')

@if(empty($type))
        <h1>Добавление категории</h1>
    @else
        <h1>Изменение категории</h1>
    @endif    

<div class="catalog-container">

    <form action="{{ isset($type) ? route('types.update', $type->id) : route('addType') }}" method="POST" enctype="multipart/form-data">
    
    
    @if(isset($type))
        @method('PUT')
    @endif

    <!-- Основные поля (Название, Цена и т.д.) -->

    <div class="form-group">
        <label>Название категории</label>
        <input type="text" name="type" required value="{{ $type?->type ?? old('model') }}">
    </div>
 
    <div class="form-group mb-3">
        <label class="main-label">Главное изображение часов</label>
        
        <!-- Переносим id="watch-image" на сам инпут -->
        <label class="file-upload-label">
            <span class="upload-btn-text">📁 Выберите файл изображения</span>
            <input type="file" name="image" accept="image/*" class="file-input-hidden" id="watch-image">
        </label>
        
        <div class="mt-2">
            <img id="image-preview" src="{{$type?->image_url ?? old('image')}}" alt="Превью" style="max-width: 150px; max-height: 150px;display: block; border: 1px solid #ddd; padding: 5px; border-radius: 4px;">
        </div>
    </div> 
        <button type="submit">Отправить</button>
    </form>

</div>
<script src="{{ asset('js/watches.js') }}"></script>
    
@endsection('content')