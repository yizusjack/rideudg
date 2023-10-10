<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $color = new Color();
        $color -> name_co = 'Blanco';
        $color->save();

        $color = new Color();
        $color -> name_co = 'Rojo';
        $color->save();

        $color = new Color();
        $color -> name_co = 'Gris';
        $color->save();

        $color = new Color();
        $color -> name_co = 'Negro';
        $color->save();

        $color = new Color();
        $color -> name_co = 'Azul';
        $color->save();

        $color = new Color();
        $color -> name_co = 'Verde';
        $color->save();

        $color = new Color();
        $color -> name_co = 'Amarillo';
        $color->save();
    }
}
