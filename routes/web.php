<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterHelpLinkController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterUsefulLinkController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\VistaPreviaController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;


// Home Route
Route::get('/', [HomeController::class, 'index'])->middleware('localization')->name('home');


Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/blog-details', function () {  
    return view('frontend.blog-details');
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
    Route::get('/profile/actividades/modal-details/{id}', [ProfileController::class, 'getLogTimeDetails'])->name('actividades.modal-details');

    Route::get('/profile/register/activity', [ProfileController::class, 'registerActivityView'])->name('profile.register-activity.view');
    Route::post('/profile/register/activity/store', [ProfileController::class, 'registerActivityStore'])->name('profile.register-activity.store');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';


// ******************************************************************************************************************
// Users Frontend Web Routes
// ******************************************************************************************************************
Route::get('portfolio-details/{id}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');
Route::get('blog-details/{id}', [HomeController::class, 'showBlog'])->name('show.blog');
Route::get('blog-details-show-image/{image}', [HomeController::class, 'showBlogImage'])->name('show.blog.image');
Route::get('blogs', [HomeController::class, 'blogs'])->name('show.blogs');
Route::post('contact', [HomeController::class, 'contact'])->name('contact.store');




// ******************************************************************************************************************
// Admin Routes: prefix admin para prefijo del nombre de la ruta url y as admin. para prefijo de nombre de las rutas.
// ******************************************************************************************************************
Route::group(['middleware' => ['auth', 'localization'], 'prefix' => 'admin', 'as' => 'admin.'], function () {


    // **********
    // Mis Vistas
    // **********

    // Vistas Previas
    Route::get('vista-previa/{previa_titulo}/{previa_imagen}/{pagina_regreso}', [VistaPreviaController::class, 'index'])->name('vista-previa.index');

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

    // Portfolio Category - Categorías Routes
    Route::resource('category', CategoryController::class);

    // Portfolio Item Routes
    Route::resource('portfolio-item', PortfolioItemController::class);

    // Portfolio Section Setting Routes
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class);

    // Skill Section Setting Routes
    Route::resource('skill-section-setting', SkillSectionSettingController::class);

    // Skill Item Routes
    Route::resource('skill-item', SkillItemController::class);
 
    // Experience Routes
    Route::resource('experience', ExperienceController::class);

    // Feedback Routes
    Route::resource('feedback', FeedbackController::class);

    // Feedback Section Setting Routes
    Route::resource('feedback-section-setting', FeedbackSectionSettingController::class);

    // Blog Category Routes
    Route::resource('blog-category', BlogCategoryController::class);
    
    // Blog Routes
    Route::resource('blog', BlogController::class);

    // Blog Section Setting Routes
    Route::resource('blog-section-setting', BlogSectionSettingController::class);

    // Contact Section Setting Routes
    Route::resource('contact-section-setting', ContactSectionSettingController::class);

    // Footer Section Routes
    Route::resource('footer-social', FooterSocialLinkController::class);

    // Footer Info Routes
    Route::resource('footer-info', FooterInfoController::class);

    // Footer Contact Info Routes
    Route::resource('footer-contact-info', FooterContactInfoController::class);

    // Footer Useful Links Routes
    Route::resource('footer-useful-links', FooterUsefulLinkController::class);

    // Footer Help Links Routes
    Route::resource('footer-help-links', FooterHelpLinkController::class);

    // Settings
    Route::get('settings', SettingController::class)->name('settings.index');

    // General Settings Routes
    Route::resource('general-setting', GeneralSettingController::class);

});
