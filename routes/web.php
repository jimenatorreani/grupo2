<?php

use Illuminate\Support\Facades\Route;
/*use App\Http\Controllers\ContactoController;*/

/*Ruta para la vista de inicio de laravel*/
Route::get('/', function () {
    return view('welcome');
});

/*Ruta para las vistas ('principal'.'quienes-somos','comercializacion','contactos','terminos-y-usos','consultas')*/
Route::get('/principal', function () {
return view('frontend.principal');
});

Route::get('/quienes-somos', function () {
    return view('frontend.quienes-somos');
});

Route::get('/comercializacion', function () {
return view('frontend.comercializacion');
});

Route::get('/contactos', function () {
    return view('frontend.contactos');
});

Route::get('/terminos-y-usos', function () {
    return view('frontend.terminos-y-usos');
});

Route::get('/consultas', function () {
    return view('frontend.consultas');
});

/*Ruta para la vista de los catálogos 'hombres' 'mujeres' */
Route::get('/hombres/{categoria?}', function ($categoria = null) {
 return view('catalogo.hombres', compact('categoria'));
});

Route::get('/mujeres/{categoria?}', function ($categoria = null) {
 return view('catalogo.mujeres', compact('categoria'));
});

/*Rutas para las vistas 'pagos','envios','entregas' y 'devoluciones' de la seccion comercializacion */
Route::view('/pagos', 'info.pagos')->name('pagos');
Route::view('/envios', 'info.envios')->name('envios');
Route::view('/entregas', 'info.entregas')->name('entregas');
Route::view('/devoluciones', 'info.devoluciones')->name('devoluciones');


/*Route::get('/contacto', [ContactoController::class, 'index']); 
Route::post('/contacto', [ContactoController::class, 'procesar']);*/