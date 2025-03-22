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
                'name' => 'Desarrollo Web',
                'slug' => 'desarrollo-web',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'PHP',
                'slug' => 'php',
                'created_at' => now(),
                'updated_at' => now()
            ]

        );

    }

}
