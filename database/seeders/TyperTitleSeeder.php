<?php

namespace Database\Seeders;

use App\Models\TyperTitle;
use Database\Factories\TyperTitleFactory;
use Flasher\Prime\Notification\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TyperTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TyperTitle::insert([
            [
                'title' => 'El trabajo duro siempre vence a la genialidad cuando la genialidad no trabaja duro'
            ],
            [
                'title' => 'La innovación distingue a un líder de un seguidor'
            ],
            [
                'title' => 'El éxito no es un destino, es un viaje, disfrútalo'
            ],
            [
                'title' => 'No tengas miedo de fallar, ten miedo de no intentarlo'
            ],
            [
                'title' => 'La productividad es resultado del compromiso'
            ],
            [
                'title' => 'La acción es la clave del éxito'
            ]
        ]);


    }




}
