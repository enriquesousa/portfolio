<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\VistaPreviaController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/blog-details', function () {  
    return view('frontend.blog-details');
});

Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// ******************************************************************************************************************
// Admin Routes: prefix admin para prefijo del nombre de la ruta url y as admin. para prefijo de nombre de las rutas.
// ******************************************************************************************************************
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    // *********
    // Secciones
    // *********

    // Hero Section CRUD
    Route::get('hero/{previa_titulo}/{previa_imagen}/{pagina_regreso}', [HeroController::class, 'index'])->name('hero.index');
    Route::get('hero/create', [HeroController::class, 'create'])->name('hero.create');
    Route::post('hero', [HeroController::class, 'store'])->name('hero.store');
    Route::get('hero/{hero}/edit', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('hero/{hero}', [HeroController::class, 'update'])->name('hero.update');
    Route::delete('hero/{hero}', [HeroController::class, 'destroy'])->name('hero.destroy');
    // Route::resource('hero', HeroController::class);
    
    // Typer Title CRUD
    Route::get('typer-title/{previa_titulo}/{previa_imagen}/{pagina_regreso}', [TyperTitleController::class, 'index'])->name('typer-title.index');
    Route::get('typer-title/create', [TyperTitleController::class, 'create'])->name('typer-title.create');
    Route::post('typer-title', [TyperTitleController::class, 'store'])->name('typer-title.store');
    Route::get('typer-title/{typer_title}/edit', [TyperTitleController::class, 'edit'])->name('typer-title.edit');
    Route::put('typer-title/{typer_title}', [TyperTitleController::class, 'update'])->name('typer-title.update');
    Route::delete('typer-title/{typer_title}', [TyperTitleController::class, 'destroy'])->name('typer-title.destroy');



    // Vistas Previas
    Route::get('vista-previa/{previa_titulo}/{previa_imagen}/{pagina_regreso}', [VistaPreviaController::class, 'index'])->name('vista-previa.index');


});
