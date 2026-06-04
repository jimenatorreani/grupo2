<?php

use Illuminate\Support\Facades\Route;
/*use App\Http\Controllers\ContactoController;*/
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;

/*Ruta para la vista de inicio de laravel*/
Route::get('/', function () {
    return view('frontend.principal');
});

/*Ruta para las vistas ('principal'.'quienes-somos','comercializacion','contactos','terminos-y-usos','consultas')*/
Route::get('/principal', function () {
return view('frontend.principal');
});

Route::get('/comercializacion', function () {
return view('frontend.comercializacion');
});


/*Ruta para la vista de los catálogos 'hombres' 'mujeres' */
Route::get('/hombres/{categoria?}', function ($categoria = null) {
 return view('frontend.catalogo.hombres', compact('categoria'));
});

Route::get('/mujeres/{categoria?}', function ($categoria = null) {
 return view('frontend.catalogo.mujeres', compact('categoria'));
});

/*Rutas para las vistas 'pagos','envios','entregas' y 'devoluciones' de la seccion comercializacion */
Route::view('/pagos', 'frontend.info.pagos')->name('pagos');
Route::view('/envios', 'frontend.info.envios')->name('envios');
Route::view('/entregas', 'frontend.info.entregas')->name('entregas');
Route::view('/devoluciones', 'frontend.info.devoluciones')->name('devoluciones');

Route::get('/contactos', function () {
    return view('frontend.contactos'); 
});
Route::post('/contactos', function () {
    return "Consulta enviada correctamente";
});

Route::get('/terminos-y-usos', function () {
    return view('frontend.terminos-y-usos'); 
});

 Route::get('/consultas', function () {
    return view('frontend.consultas'); 
});

Route::get('/quienes-somos', function () {
    return view('frontend.quienes-somos');
});

/*Route::get('/contacto', [ContactoController::class, 'index']); 
Route::post('/contacto', [ContactoController::class, 'procesar']);*/


//Rutas para el Backend 

/*
El Route Model Binding es el mecanismo que toma el ID de la URL (/roles/3/edit) 
y automáticamente busca el registro correspondiente en la base de datos.
*/

//Ruta Controlador RolController
Route::resource('roles', RolController::class); //Laravel crea automáticamente todas las rutas CRUD de roles.
                                                //Laravel tmb genera automaticamente esta ruta: roles/{role}/edit

/*
Route::resource('roles', RolController::class)
     ->parameters([          personalizamos el nombre de la ruta p/q laravel no genere automaticamente {'role'}
         'roles' => 'rol'   el nombre del parametro de la ruta debe coincidir con el nombre de los parámetros de los métodos. {'rol'}
     ]);
*/

/*Ruta Controlador UserController*/ 
Route::resource('usuarios', UserController::class); //Laravel crea automáticamente todas las rutas CRUD de usuarios.

/* Ruta para ver usuarios eliminados y reestaurarlos si se quiere */
Route::put('/usuarios/{id}/restore', [UserController::class, 'restore'])
     ->name('usuarios.restore');

Route::get('/usuarios-eliminados', [UserController::class, 'deleted'])
     ->name('usuarios.deleted');