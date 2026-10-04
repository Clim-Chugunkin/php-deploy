<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Watch;

class WatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // 1. Легендарная Амфибия "Мужик в пузыре" (Классический дайвер)
        Watch::create([
            'brand' => 'Восток',
            'model' => 'Амфибия 420059',
            'price' => 5490.00,
            'specs' => [
                'mechanism' => 'Механический с автоподзаводом',
                'caliber' => 'Восток 2416Б',
                'jewels' => 31,
                'glass' => 'Органическое',
                'water_resist' => 200,
                'case_material' => 'Нержавеющая сталь',
                'bezel' => 'Вращающийся (двунаправленный)',
                'power_reserve' => 31,
                'accuracy' => '-20 / +60 сек/сутки',
                'shock_proof' => true,
                'dial_color' => 'Синий'
            ]
        ]);

        // 2. Классические Командирские (Ручной завод, латунь)
        Watch::create([
            'brand' => 'Восток',
            'model' => 'Командирские 431118',
            'price' => 3100.00,
            'specs' => [
                'mechanism' => 'Механический (ручной завод)',
                'caliber' => 'Восток 2414А',
                'jewels' => 17,
                'glass' => 'Органическое',
                'water_resist' => 20,
                'case_material' => 'Латунь с хромовым покрытием',
                'bezel' => 'Вращающийся',
                'power_reserve' => 36,
                'accuracy' => '-20 / +60 сек/сутки',
                'shock_proof' => true,
                'dial_color' => 'Черный'
            ]
        ]);

        // 3. Современная Амфибия "Нептун" (Лимитированная серия)
        Watch::create([
            'brand' => 'Восток',
            'model' => 'Амфибия Нептун 960758',
            'price' => 11200.00,
            'specs' => [
                'mechanism' => 'Механический с автоподзаводом',
                'caliber' => 'Восток 2415.01',
                'jewels' => 31,
                'glass' => 'Минеральное', // Здесь стекло уже минеральное
                'water_resist' => 200,
                'case_material' => 'Нержавеющая сталь',
                'bezel' => 'Вращающийся (однонаправленный)',
                'power_reserve' => 38,
                'accuracy' => '-20 / +60 сек/сутки',
                'shock_proof' => true,
                'dial_color' => 'Зеленый'
            ]
        ]);
    }
}
