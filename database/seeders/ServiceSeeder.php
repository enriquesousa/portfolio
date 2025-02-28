<?php

namespace Database\Seeders;

use App\Models\Service as ModelsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsService::insert([

            [
                'name' => 'Desarrollo Full Stack',
                'description' => 'Desarrollamos aplicaciones Full Stack, esto incluye la creación y mantenimiento de la lógica del sistema para que la aplicación pueda funcionar de manera eficiente y segura. También trabajamos en el Frontend donde diseñamos interfaces para el usuario.',
            ],
            [
                'name' => 'Servicios Backend',
                'description' => 'Gestionar bases de datos, Procesar Datos, Migración de Datos, Implementar APIs, Gestionar la autenticación y la autorización, Comunicación entre Frontend y Backend mediante modelo MVC, Implementar Lógica Empresarial, Integrar Servicios de Terceros.',
            ],
            [
                'name' => 'Servicios Frontend',
                'description' => 'Diseño de Pagina, Adición de texto, imágenes, botones, íconos, ventanas emergentes y chats, Verificación de que todos los botones funcionan, Adaptación para distintas pantallas (Diseño Responsivo), Configuración de la compatibilidad entre navegadores.',
            ],
            [
                'name' => 'Tecnologías Usadas',
                'description' => 'Backend: PHP,JavaScript (Node.js), npm, Java, Laravel Framework, Modelo MVC, Eloquent ORM, Hash, Migrar Base de Datos, Artisan, Composer, Git. Frontend: HTML5, CSS3, JavaScript, Jquery, Ajax, Blade',
            ],
            
        ]);
        
    }
}
