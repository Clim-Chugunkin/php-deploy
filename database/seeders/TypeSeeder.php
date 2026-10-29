<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Type::create([
            'type' => 'Командирские'
        ]);

        Type::create([
            'type' => 'Амфибия'
        ]);

        Type::create([
            'type' => 'Восток'
        ]);

        Type::create([
            'type' => 'Женские'
        ]);

    }
}
