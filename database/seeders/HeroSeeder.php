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
                'title' => 'TJWeb',
                'sub_title' => 'Brindamos soluciones integrales de diseño y desarrollo de aplicaciones web para impulsar al máximo el potencial de nuestros clientes',
                'btn_text' => 'Conócenos',
                'btn_url' => '#about',
                'image' => '/frontend/assets/imagenes/hero-800x368_blur_clara.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
