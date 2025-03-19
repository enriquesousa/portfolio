<?php


/*

Las Funciones Globales las podemos mandar llamar de cualquier parte de la aplicación!

Funciones Globales - Global Functions
-------------------------------------
Para que funcionen las funciones globales de Laravel
tenemos que agregar al autoload en composer.json
"autoload": {
    "psr-4": {
        ...
    },
    "files": [
        "app/Helpers/helpers.php"
    ]
}

Como le hicimos cambios a composer, tenemos que correr:
composer dump-autoload
o
composer du

*/


use Illuminate\Support\Facades\File;


/** Handle file upload -  Subir archivo a /uploads */
function handleUpload($inputName, $model=null){
    try{
        if(request()->hasFile($inputName)){
            
            if($model && File::exists(public_path($model->{$inputName}))) {
                File::delete(public_path($model->{$inputName}));
            }

            $file = request()->file($inputName);
            $fileName = rand().$file->getClientOriginalName();
            $file->move(public_path('/uploads'), $fileName);

            $filePath = "/uploads/".$fileName;

            return $filePath;
        }
    }catch(\Exception $e){
        throw $e;
    }

}



// Regresa el lenguaje de la sesión
if(!function_exists('getSessionLocale')){
    function getSessionLocale()
    {
        if(session()->has('locale')) {
            $locale = session('locale'); // Retrieve a piece of data from the session..
            return $locale;
        }

        return config('app.locale');
    }
}