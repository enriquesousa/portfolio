<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Hero::insert([
            [
                'title' => 'Hola, somos TJWeb',
                'sub_title' => 'Brindamos soluciones integrales de diseño y desarrollo de aplicaciones web para impulsar al máximo el potencial de nuestros clientes',
                'btn_text' => 'Conócenos',
                'btn_url' => '#about',
                'image' => '/uploads/portafolio_hero_67bd116c6866c.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
