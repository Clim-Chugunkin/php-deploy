<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $watch->name }} — Интернет-магазин</title>
</head>
<body class="card-watch-body">

    <a  href="/" id="back-link" class="back-link">← Вернуться в каталог</a>

    <div class="card-watch-container">
        <!-- Ссылка возврата в каталог -->
        
        <!-- Блок с картинкой -->
        <div class="product-image">
            <img src="{{$watch->image_url}}" alt="{{ $watch->name }}">
        </div>

        <!-- Блок с основной информацией -->
        <div class="product-info">
            <h1>{{ $watch->brand ?? $watch->name }}</h1>
            <p style="color: #666; font-size: 14px;">ID товара: {{ $watch->id }}</p>
            <p style="color: #666; font-size: 14px;">Категория товара: {{ $watch->type?->type ?? 'Нет категории'}}</p>

            <div class="price">
                {{ number_format($watch->price, 0, '.', ' ') }} ₽
            </div>

            <!-- Кнопка добавления в корзину -->
            <button class="btn-buy" data-id="{{ $watch->id }}">Добавить в корзину</button>
        </div>

        <!-- Блок характеристик из JSON-поля specs -->
        <div class="specs-section">
            <h2>Характеристики часов</h2>
            
            @if(!empty($watch->specs) && is_array($watch->specs))
                <table class="specs-table">
                    @foreach($watch->specs as $key => $value)
                        {{-- Выводим характеристику только если она заполнена --}}
                        @if($value !== null && $value !== '')
                            <tr>
                                {{-- Проверяем наличие перевода ключа в конфиге watch_attributes.labels --}}
                                <td>{{ config('watch_attributes.labels.' . $key) ?? $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            @else
                <p>Характеристики для данного товара не указаны.</p>
            @endif
        </div>
    </div>

    </body>
</html>
