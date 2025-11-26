<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
            \App\Models\Product::create([
                'model' => 'CG 160 Start',
                'marca' => 'Honda',
                'description' => 'Versão de entrada da linha CG 160. Econômica, leve e ideal para o uso urbano diário.',
                'price' => 16308.00,
                'image' => 'cg160_start.jpg',
            ]);

            \App\Models\Product::create([
                'model' => 'CG 160 Fan',
                'marca' => 'Honda',
                'description' => 'Modelo intermediário da linha CG 160. Confortável, eficiente e com excelente custo-benefício.',
                'price' => 17860.00,
                'image' => 'cg160_fan.jpg',
            ]);

            \App\Models\Product::create([
                'model' => 'CG 160 Titan',
                'marca' => 'Honda',
                'description' => 'A versão mais completa da CG 160. Ótimo desempenho, visual moderno e ideal para longas distâncias.',
                'price' => 19788.00,
                'image' => 'cg160_titan.jpg',
            ]);

            \App\Models\Product::create([
                'model' => 'YBR 125 Factor',
                'marca' => 'Yamaha',
                'description' => 'Moto leve e econômica, perfeita para quem busca praticidade e baixo consumo no dia a dia.',
                'price' => 9500.00,
                'image' => 'ybr125_factor.jpg',
            ]);

            \App\Models\Product::create([
                'model' => 'Biz 125',
                'marca' => 'Honda',
                'description' => 'Modelo fácil de pilotar e muito econômico. Ideal para mobilidade urbana com ótimo conforto.',
                'price' => 12000.00,
                'image' => 'biz125.jpg',
            ]);


        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        

        \App\Models\Category::factory(5)->create();
    }
}