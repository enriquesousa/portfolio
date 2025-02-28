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
                'image' => '/uploads/about-image.jpg',
                'resume' => 'Consectetur adipisicing elit. Laborum, magni libero similique, laboriosam, delectus reiciendis minima minus dolorem sit fuga rerum atque vel quaerat ipsum perspiciatis neque maxime recusandae fugit Ipsum dolor sit amet, consectetur adipisicing elit. Laborum, magni libero similique, laboriosam, delectus reiciendis minima minus dolorem sit fuga rerum atque vel quaerat ipsum perspiciatis neque maxime recusandae fugit.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
