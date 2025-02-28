<?php

namespace Database\Seeders;

use App\Models\TyperTitle;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        // **********************
        // Factories and seeders
        // **********************

        User::factory(1)->create();

        // con: php artisan migrate:refresh --seed puedo agregar todo desde cero
        //TyperTitle::factory(10)->create();   // con  db:seed puedo agregar 10 typer title a la base de datos
        $this->call(TyperTitleSeeder::class);  // Crear los mensajes estáticos

        $this->call(HeroSeeder::class);

        $this->call(ServiceSeeder::class);

        $this->call(AboutSeeder::class);
    }

}
