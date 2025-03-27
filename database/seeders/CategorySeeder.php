<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert(

            [
                'name' => 'Gestor Inventarios',
                'slug' => 'gestor-inventarios',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Punto de Venta',
                'slug' => 'punto-de-venta',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Gestor Bienes Raíces',
                'slug' => 'gestor-bienes-raíces',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Gestor Escuelas',
                'slug' => 'gestor-escuelas',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Blog',
                'slug' => 'blog',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Gestor Veterinarias',
                'slug' => 'gestor-veterinarias',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Gestor Restaurantes',
                'slug' => 'gestor-restaurantes',
                'created_at' => now(),
                'updated_at' => now()
            ],  

        );

        // "Gestor de Noticias": "Manage News",
        // "Gestor de Eventos": "Manage Events",
        // "Gestor de Productos": "Manage Products",
        // "Gestor de Servicios": "Manage Services",
        // "Gestor de Cursos": "Manage Courses",

    }

}
