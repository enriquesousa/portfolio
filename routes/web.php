<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\VistaPreviaController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Middleware\LocalizationMiddleware;
use Illuminate\Support\Facades\Route;


// Home Route
Route::get('/', [HomeController::class, 'index'])->middleware('localization')->name('home');


Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/blog-details', function () {  
    return view('frontend.blog-details');
});

Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
});


// Set Language
Route::get('/locale/{locale}', [LocalizationController::class, 'setLanguage'])->name('locale');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'localization'])->name('dashboard');

// Route::middleware('auth')->group(function () {
Route::group(['middleware' => ['auth', 'localization'], ], function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar/update', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::patch('/profile/language/update', [ProfileController::class, 'updateLanguage'])->name('profile.language.update');
    Route::get('/profile/actividades', [ProfileController::class, 'actividades'])->name('profile.actividades.index');
    Route::get('/profile/logout/page', [ProfileController::class, 'logoutPage'])->name('profile.logoutPage.index');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';


// ******************************************************************************************************************
// Admin Routes: prefix admin para prefijo del nombre de la ruta url y as admin. para prefijo de nombre de las rutas.
// ******************************************************************************************************************
Route::group(['middleware' => ['auth', 'localization'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    // *********
    // Secciones
    // *********

    // Hero
    Route::resource('hero', HeroController::class);
    
    // Typer Title
    /* 
        Route::get('typer-title', [TyperTitleController::class, 'index'])->name('typer-title.index');
        Route::get('typer-title/create', [TyperTitleController::class, 'create'])->name('typer-title.create');
        Route::post('typer-title', [TyperTitleController::class, 'store'])->name('typer-title.store');
        Route::get('typer-title/{typer_title}/edit', [TyperTitleController::class, 'edit'])->name('typer-title.edit');
        Route::put('typer-title/{typer_title}', [TyperTitleController::class, 'update'])->name('typer-title.update');
        Route::delete('typer-title/{typer_title}', [TyperTitleController::class, 'destroy'])->name('typer-title.destroy');
    */
    Route::resource('typer-title', TyperTitleController::class);

    // Servicios
    Route::resource('service', ServiceController::class);

    // About - Acerca de mi
    Route::get('/resume/download', [AboutController::class, 'downloadResume'])->name('resume.download');
    Route::resource('about', AboutController::class);

    // Category - Categorías Routes
    Route::resource('category', CategoryController::class);

    

    // Vistas Previas
    Route::get('vista-previa/{previa_titulo}/{previa_imagen}/{pagina_regreso}', [VistaPreviaController::class, 'index'])->name('vista-previa.index');


});
