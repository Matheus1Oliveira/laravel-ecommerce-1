<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Produtos (BRINQUEDOS)
        Product::create([
            'modelo' => 'Carrinho de Controle Remoto Turbo Racer',
            'marca' => 'HotSpeed',
            'faixaetaria' => 6,
            'price' => 149.90,
            'image' => 'carrinho_controle_turbo.png',
        ]);

        Product::create([
            'modelo' => 'Boneca Princesa Encantada com Acessórios',
            'marca' => 'MagicDolls',
            'faixaetaria' => 4,
            'price' => 89.90,
            'image' => 'boneca_princesa.png',
        ]);

        Product::create([
            'modelo' => 'Blocos de Montar – Kit Criativo 300 peças',
            'marca' => 'BlockMaster',
            'faixaetaria' => 5,
            'price' => 119.90,
            'image' => 'blocos_montar_300.png',
        ]);

        Product::create([
            'modelo' => 'Robô Interativo com Luzes e Sons',
            'marca' => 'TechPlay',
            'faixaetaria' => 7,
            'price' => 199.90,
            'image' => 'robo_interativo.png',
        ]);

        Product::create([
            'modelo' => 'Jogo de Tabuleiro – Aventura na Selva',
            'marca' => 'FunGames',
            'faixaetaria' => 8,
            'price' => 79.90,
            'image' => 'jogo_tabuleiro_selva.png',
        ]);

        Product::create([
            'modelo' => 'Kit Médico Infantil Completo 12 peças',
            'marca' => 'PlayDoctor',
            'faixaetaria' => 3,
            'price' => 59.90,
            'image' => 'kit_medico_infantil.png',
        ]);

        Product::create([
            'modelo' => 'Pista de Carrinhos com Looping Duplo',
            'marca' => 'HotSpeed',
            'faixaetaria' => 6,
            'price' => 139.90,
            'image' => 'pista_looping_duplo.png',
        ]);

        Product::create([
            'modelo' => 'Quebra-cabeça 200 peças – Mundo Animal',
            'marca' => 'PuzzleKids',
            'faixaetaria' => 5,
            'price' => 34.90,
            'image' => 'puzzle_mundo_animal.png',
        ]);

        Product::create([
            'modelo' => 'Pelúcia Interativa – Ursinho Musical',
            'marca' => 'SoftFriends',
            'faixaetaria' => 2,
            'price' => 69.90,
            'image' => 'pelucia_ursinho_musical.png',
        ]);

        Product::create([
            'modelo' => 'Super Kit de Slime – 15 cores + glitter',
            'marca' => 'SlimeLab',
            'faixaetaria' => 8,
            'price' => 49.90,
            'image' => 'kit_slime_completo.png',
        ]);

        // Usuários
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Usuario',
            'email' => 'user@email.com',
            'password' => bcrypt('password'),
        ]);

        // Categorias
        Category::factory(5)->create();
    }
}
