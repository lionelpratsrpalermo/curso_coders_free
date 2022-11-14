<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "Hello World";
    return view('welcome');
});
Route::get('/prueba', function () {
    return "Hola desde la ruta prueba";
});
Route::get('/cursos/informacion', function () {
    return "Aqui podras encontrar toda la informacion de los cursos";
});
/* Route::get('/cursos/{curso}', function ($curso) {
    return $curso;
}); */
Route::get('/cursos/{curso}/{category?}', function ($curso, $category = null) {
    if ($category)
        return "Bienvenido al curso de $curso (categoría $category)";
    else
        return "Debes seleccionar la categroría correspondiente al curos de $curso";
});
Route::get('/regular_expressions', function () {
    /* 
    $string = 'lionelprats@gmail.com';
    $arroba = "/@/";
    $dotCom = "/.com$/";
    if (preg_match($arroba, $string) and preg_match($dotCom, $string))
        return "$string es un email correcto";
    return "$string no es una dirección de correo válida."; 
    */

    /* 
    $string = 'Avenida';
    $regular_expression = "/^Av/i";
    if (preg_match($regular_expression, $string))
        return "Los datos ingresados son correctos";
    return "Tiene que ingresar una avenida."; 
    */

    $string = 'Llegaré pronto que voy anxando';
    // $regular_expression = "/hol[^b-u6-9\]]/i"; // i al final para indicar que no distinga entre mayusculas y minusculas
    /* $regular_expression = "/b.lita/i"; */
    /* $regular_expression = "/b\wlita/i"; */ // \w -> solo alfanumericos
    // $regular_expression = "/b\Wlita/i"; // \W -> solo no alfanumericos 21'50"
    // $regular_expression = "/b\dlita/i"; // \d -> solo numeros -> 22'38"
    // $regular_expression = "/b\Dlita/i"; // \D -> todo menos numeros -> 23'10"
    // $regular_expression = "/hola*s/i"; // * -> la "a" puede existir (una o muchas veces), o no -> 24'05"
    // $regular_expression = "/hola+s/i"; // + -> la "a" debe existir al menos 1 vez -> 25'43"
    // $regular_expression = "/ho?la/i"; // ? -> la "o" puede existir o no -> 26'18"
    // $regular_expression = "/ho{3}la/i"; // {3} -> la "o" debe existir 3 veces -> 28'20"
    // $regular_expression = "/ho{2,5}la/i"; // {2,5} -> la "o" puede existir entre 2 y 5 veces -> 29'40"
    $regular_expression = "/Llegaré pronto que voy (vol|and)ando/i"; // (vol|and) -> los () nos permiten crear subpatrones -> "vol" o "and" debe preceder al string "ando" -> 30'45"
    if (preg_match($regular_expression, $string, $matches))
        echo "Datos correctos <br>";
    else
        echo "Datos incorrectos <br>";
    var_dump($matches);

    echo "<br><br><br><br>";


    // https://www.youtube.com/watch?v=gL5oO63sT5I
    // https://youtu.be/gL5oO63sT5I
    // $url = 'youtu.be/gL5oO63sT5I';
    $url = 'Youtube.com/watch?v=gL5oO63sT5I';

    // $patron = "%^(https://)?(www\.)?(youtu\.be/|youtube\.com/watch\?v=)(\w{10,12})%";
    $patron = "%^(?:https://)?(?:www\.)?(?:youtu\.be/|youtube\.com/watch\?v=)(\w{10,12})%i"; // ?: -> para omitir los subpatrones que no me interese recuperar -> 51'35"
    if (preg_match($patron, $url, $matches2)) {
        echo "La URL es válida <br>";
    } else {
        echo "La URL no es válida <br>";
    }
    echo "<pre>";
    // print_r($matches);
    print_r($matches2);
    // print_r($matches2[4]);
    echo "<pre>";
});

/*
Route::get('/carreras/{carrera}', function ($carrera) {
    return $carrera;
    // })->where('carrera', '[1-9]+'); // solo numeros
    // })->where('carrera', '[A-Ka-z]+'); // solo letras, mayusculas y minusculas
    // })->where('carrera', '[A-Ka-z1-9]+'); // letras (may y min) y numeros
    // })->whereAlpha('carrera'); // solo letras (may y min)
})->whereAlphaNumeric('carrera'); // letras (may y min) y numeros
*/

Route::get('/carreras/{id}', function ($id) {
    return $id;
});

Route::get('/test', function () {
    $pdf = PDF::loadView('pruebaparapdf');
    return $pdf->download('pruebapdf.pdf');
});

// php artisan route:cache // corriendo este comando en la terminal almaceno en cache los archivos de rutas (sirve en produccion)
// php artisan route:clear // reertimos los cambios que genera el comando anterior (conviene en desarrollo)