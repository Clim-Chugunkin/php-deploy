<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('watches', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 100);       // Бренд (например, 'Восток')
            $table->string('model', 100);       // Модель (например, 'Амфибия 420059')
            $table->decimal('price', 10, 2);    // Цена часов
            $table->string('image')->nullable();
            $table->json('specs');            
            $table->timestamps();
            // Добавляем индексы, чтобы фильтрация по бренду и цене на сайте работала быстро
            $table->index('brand');
            $table->index('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watches');
    }
};
