<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VistaPreviaController extends Controller
{

    public function index($previa_titulo, $previa_imagen, $pagina_regreso)
    {
        // dd($previa_titulo, $previa_imagen, $pagina_regreso);
        $previaTitulo = $previa_titulo;
        $previaImagen = $previa_imagen;
        $paginaRegreso = $pagina_regreso; // Pagina a la que vamos a regresar
        return view('admin.vista-previa.index', compact('previaTitulo', 'previaImagen', 'paginaRegreso'));
    }
    

}
