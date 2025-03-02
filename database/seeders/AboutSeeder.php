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
                'description' => '<div align="center"><blockquote class="blockquote"><p>Hola mi nombre es Enrique Sousa, mi pasión es la programación, y soy desarrollador web. Algunas de las tecnologías que uso son HTML, CSS, JavaScript, PHP, MySQL, Laravel y Bootstrap 5, LiveWire, Vue.js, React.</p></blockquote></div><p align="center">Algunos de los proyectos que he realizado son:</p>
                <table class="table table-bordered">
                <tbody>
                <tr>
                <td align="center">Sistema de <b>Bienes Raíces</b> con Laravel 10</td>
                <td align="center">Sistema <b>Punto de Venta</b> con Laravel 9</td>
                <td align="center">Sistema <b>Manejo de Inventarios</b> con Laravel 9</td>
                </tr>
                </tbody>
                </table>

                <table class="table table-bordered">
                <tbody>
                <tr>
                <td align="center">Sistema <b>E-Commerce</b> Ordenes Restaurante con Laravel 11</td>
                <td align="center">Sistema para administración de&nbsp; <b>Veterinarias</b> con Laravel 11</td>
                <td align="center"><p>Sistema <b>Portafolios y Blog</b>&nbsp; con Laravel 11</p></td>
                </tr>
                </tbody>
                </table>

                <p></p><span style="font-family: " segoe="" ui";"="">En este sitio encontrarás información sobre mí, mis proyectos, mis habilidades y mis servicios. También te puedes contactar conmigo a través de mi correo o teléfono. Además en la sección de Blog estaré publicando artículos sobre Laravel, Programación, Tecnologías de la información y temas interesantes. En mi tiempo libre, me gusta tocar el Piano, jugar videojuegos, ver series y películas, y aprender cosas nuevas. <br></span>',
                'image' => '/frontend/assets/imagenes/aboutImage-550x550.jpg',
                'resume' => '',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
