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

use App\Models\LogTime;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


// *************************
// *** GENERAL FUNCTIONS ***
// *************************

// grabarLoginTime
if (!function_exists('grabarLoginTime')) {
    function grabarLoginTime()
    {
        $user = User::find(Auth::id());
        // dd($user->name);

        LogTime::create([
            'user_id' => $user->id,
            // 'description' => 'Inicio de sesión',
            'login_time' => now()
        ]);

        return true;
    }
}

// grabarLogout Time
if (!function_exists('grabarLogoutTime')) {
    function grabarLogoutTime($description = null)
    {
        $user = User::find(Auth::id());
        // dd($user->id);

        // Encontrar la ultima sesión del usuario en tabla log_times
        $logTime = LogTime::where('user_id', $user->id)->orderBy('id', 'desc')->first();
        // dd($logTime);
        // dd($description);

        // Si logout_time no esta vació significa que user ya registro actividad, en ese caso crear nuevo registro
        $lastLogTime = $logTime->logout_time;
        if(!empty($lastLogTime)) {
            LogTime::create([
                'user_id' => $user->id,
                'login_time' => $lastLogTime,
                'logout_time' => now(),
                'description' => $description
            ]);
        }else {
            $logTime->logout_time = now();

            if(empty($description)) {
                $description = 'Cierre de sesión';
            }elseif ($description == 'No registrar actividad') {
                $description = '';
            }
            else {
                $description = $description;
            }
            $logTime->description = $description;

            $logTime->save();    
        }

        return true;
    }
}

// Handle file upload - Para la sección About -  Subir archivo a /uploads
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

// Delete File
function deleteFileIfExists($path){
    try{
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
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

// Get colores en forma dinámica de un array de colors, para la sección de skills
if(!function_exists('getColor')){
    function getColor($index)
    {
        $colors =['#558bff','#fecc90','#ff885e','#282828','#190844','#9dd3ff'];
        return $colors[$index % count($colors)];
    }
}


// Set Sidebar Active Class
if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes)
    {
        // dd($routes);

        /*
        El nombre de las rutas esta dado por `->name('product-title.index')` o `->name('product-title.update')` y no por el nombre visible de `/ptitles-update` o `/products/title-update` esto es importante cuando estamos haciendo la comparación en la función global `setSidebarActive(array $routes)`
        */

        
        // foreach($routes as $route){
        //     if(request()->routeIs($route)){
        //         return 'active';
        //         // return $route;
        //     }
        // }
        // return '';

        if(is_array($routes)){
            foreach($routes as $r){
                if(request()->routeIs($r)){
                    return 'active';
                }
            }
        }
    }
}

// Convertir markdown en html
if (!function_exists('markdownToHtml')) {
    function markdownToHtml($text)
    {
        $html = Str::markdown($text);
        // dd($html);
        return $html;
    }
}




// ******************************
// *** GENERAL DATE FUNCTIONS ***
// ******************************

// Para regresar tiempo transcurrido entre dos fechas: "11:06 AM | 20-Noviembre-2024".
if(!function_exists('intervaloTiempo')){
    function intervaloTiempo($fecha1, $fecha2)
    {
        // $login_time = $query->login_time;
        // $logout_time = $query->logout_time;

        $date1 = new DateTime($fecha1);
        if($fecha2 == null){
            $date2 = new DateTime($fecha1);            
        }else{
            $date2 = new DateTime($fecha2);
        }

        $interval = $date1->diff($date2);
        $time_interval = '';
        // Calcular el intervalo de tiempo entre login_time y logout_time
        // $date1 = new DateTime("2007-03-24");
        // $date2 = new DateTime("2009-06-26");
        // $interval = $date1->diff($date2);
        // $to = Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 3:30:34');
        // $from = Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 9:30:34');
        // $diff_in_hours = $to->diffInHours($from);

        if($fecha2 == null){
            $time_interval = '-';
        }else{
            $time_interval = $interval->format('%h hr., %i min.');
        }
        return $time_interval;
    }
}

// Para regresar una fecha en formato: "14/Apr/25 | 9:40 AM".
if(!function_exists('formatFecha5')){
    function formatFecha5($fecha)
    {
        // $dia = Carbon::parse($fecha)->locale('es')->isoFormat('D');

        // $mes = ucfirst(Carbon::parse($fecha)->locale('es')->isoFormat('MMMM'));
        // $año = Carbon::parse($fecha)->locale('es')->isoFormat('YYYY');

        // $mes = ucfirst(Carbon::parse($fecha)->locale('es')->isoFormat('MM'));
        // $año = Carbon::parse($fecha)->locale('es')->isoFormat('YY');

        // $fecha2 = date( 'd M y', strtotime($fecha));
        $fecha2 = date( 'd/M/y', strtotime($fecha));

        // $fecha = Carbon::parse($fecha)->locale('es')->isoFormat('D [de] MMMM[,] YYYY');

        // https://www.w3schools.com/php/func_date_date.asp
        $hora = date('g:i A', strtotime($fecha));

        // $fecha = $hora . ' | '. $dia.'/'. $mes .'/' . $año;
        $fecha = $fecha2 . ' | '. $hora;
        return $fecha;
    }
}

// Para regresar una fecha en formato: "29/OCT/22".
if(!function_exists('formatFecha6')){
    function formatFecha6($fecha)
    {
        // $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
        // $meses = array("EN","FE","MA","AB","MA","JU","JL","AG","SE","OC","NO","DI");
        $fecha = Carbon::parse($fecha);
        $mes = $meses[($fecha->format('n')) - 1];
        // $inputs['Fecha'] = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');

        $dia = Carbon::parse($fecha)->locale('es')->isoFormat('D');
        // $mes = ucfirst(Carbon::parse($fecha)->locale('es')->isoFormat('MMM'));
        $año = Carbon::parse($fecha)->locale('es')->isoFormat('YY');
        // $fecha = Carbon::parse($fecha)->locale('es')->isoFormat('D [de] MMMM[,] YYYY');

        $fecha = $dia.'/'.$mes.'/'.$año;
        return $fecha;
    }
}

// Para regresar una fecha en formato: "29 MAR, 2025".
if(!function_exists('formatFechaPortfolioDetails')){
    function formatFechaPortfolioDetails($fecha)
    {
        // $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
        // $meses = array("EN","FE","MA","AB","MA","JU","JL","AG","SE","OC","NO","DI");
        $fecha = Carbon::parse($fecha);
        $mes = $meses[($fecha->format('n')) - 1];
        // $inputs['Fecha'] = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');

        $dia = Carbon::parse($fecha)->locale('es')->isoFormat('D');
        // $mes = ucfirst(Carbon::parse($fecha)->locale('es')->isoFormat('MMM'));
        $año = Carbon::parse($fecha)->locale('es')->isoFormat('YYYY');
        // $fecha = Carbon::parse($fecha)->locale('es')->isoFormat('D [de] MMMM[,] YYYY');

        $fecha = $dia.' '.$mes.', '.$año;
        return $fecha;
    }
}