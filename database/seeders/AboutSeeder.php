<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::insert([
            [
                'title' => 'Acerca de Mi',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos repellendus sapiente, quae et eos dolorum.',
                'image' => '',
                'resume' => '',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
