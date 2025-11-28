<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // 👈 faltava isso

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'description' => 'Camiseta básica preta – algodão 100%, confortável para uso diário.',
            'quantity' => 40,
            'price' => 39.90,
            'image' => 'camiseta_preta.jpg'
        ]);

        Product::create([
            'description' => 'Camiseta branca premium – tecido leve e respirável.',
            'quantity' => 35,
            'price' => 49.90,
            'image' => 'camiseta_branca.jpg'
        ]);

        Product::create([
            'description' => 'Calça jeans masculina slim – confortável e moderna.',
            'quantity' => 25,
            'price' => 129.90,
            'image' => 'calca_jeans_slim.jpg'
        ]);

        Product::create([
            'description' => 'Calça moletom unissex – ideal para dias frios.',
            'quantity' => 20,
            'price' => 99.90,
            'image' => 'calca_moletom.jpg'
        ]);

        Product::create([
            'description' => 'Vestido floral feminino – leve e perfeito para o verão.',
            'quantity' => 15,
            'price' => 89.90,
            'image' => 'vestido_floral.jpg'
        ]);

        Product::create([
            'description' => 'Jaqueta jeans unissex – estilo casual e resistente.',
            'quantity' => 10,
            'price' => 179.90,
            'image' => 'jaqueta_jeans.jpg'
        ]);

        Product::create([
            'description' => 'Moletom com capuz – flanelado por dentro, super confortável.',
            'quantity' => 18,
            'price' => 139.90,
            'image' => 'moletom_capuz.jpg'
        ]);

        Product::create([
            'description' => 'Short de tactel – ideal para academia e atividades físicas.',
            'quantity' => 30,
            'price' => 49.90,
            'image' => 'short_tactel.jpg'
        ]);

        Product::create([
            'description' => 'Saia midi – elegante e confortável para diversas ocasiões.',
            'quantity' => 12,
            'price' => 79.90,
            'image' => 'saia_midi.jpg'
        ]);

        Product::create([
            'description' => 'Blusa de lã – ideal para o inverno, macia e quente.',
            'quantity' => 8,
            'price' => 110.00,
            'image' => 'blusa_la.jpg'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Usuario',
            'email' => 'user@email.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Category::factory(5)->create();
    }
}
