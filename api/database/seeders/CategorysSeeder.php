<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            'categoria'=>'Aceites',
        ]);
        DB::table('categorias')->insert([
            'categoria'=>'Bujias',
        ]);
        DB::table('categorias')->insert([
            'categoria'=>'Filtro de aires',
        ]);
        DB::table('categorias')->insert([
            'categoria'=>'Lubricantes de cadenas',
        ]);
    }
}
