<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marca = new Marca();
        $marca -> name_m = 'Ford';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'Toyota';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'Chevrolet';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'Nissan';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'Suzuki';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'Kia';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'Mazda';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'BMW';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'Ferrari';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'Fiat';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'Honda';
        $marca->save();

        $marca = new Marca();
        $marca -> name_m = 'Hyundai';
        $marca->save();
    }
}
