<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function setLanguage(Request $request, string $locale)
    {
        // dd($locale); // es | en

        if ( $locale == 'es' ) {
            $locale = 'es';            
        }
        
        if( $locale == 'en' ) {
            $locale = 'en';
        }

        // Guardar locale en custom config
        // No me funciona para el set, lo voy hacer mejor grabando a la db
        // Config::set('custom.locale', $locale);
        //  config()->set('custom.lenguaje', $locale);
        $generalSettings = GeneralSetting::first();
        $generalSettings->locale_general_user = $locale;
        $generalSettings->save();

        // dd($locale);

        // Save selected Locale to current "Session"
        // $locale = $request->locale ?? 'en';
        // dd($locale);

        //App::setLocale($locale); // There is no need for this here, as the middleware will run after the redirect() where it has already been set.
        // $request->session()->put('locale', $locale);
        // session()->save();

        // dd($locale);

        // session(['locale' => $locale]);
        // App::setLocale($locale);

        // store selected_language in session
        // session()->put('selected_language', $locale);
        // Session::put('locale', $locale);
        // App::setLocale($locale);

        // Session::put('locale_lenguaje', $locale);
        Session::put('locale', $locale);
        app()->setLocale($locale);
        session(['lenguaje' => $locale]); // set session variable


        

        // app()->setLocale(Session::get('locale'));

        // Métodos para set y get session variables
        // session(['locale' => 'es']); // set session variable
        // $locale = session('locale'); // Retrieve a piece of data from the session..

        return redirect()->back();
    }
}
