<?php

use Illuminate\Support\Facades\Route;
/*use App\Http\Controllers\ContactoController;*/
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PerfilController;

/*
Route::get('/carrito', [CarritoController::class, 'index'])
    ->name('carrito.index');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])
    ->name('carrito.agregar');
*/

/*Ruta para la vista de inicio de laravel*/
Route::get('/', [HomeController::class, 'index']);

/*Ruta para las vistas ('principal'.'quienes-somos','comercializacion','contactos','terminos-y-usos','consultas')*/
Route::get('/principal', [HomeController::class, 'index']);

Route::get('/comercializacion', function () {
return view('frontend.comercializacion');
});


/*Ruta para la vista de los catálogos 'hombres' 'mujeres' creados como cátalogo estático para el frontend 
Route::get('/hombres/{categoria?}', function ($categoria = null) {
 return view('frontend.catalogo.hombres', compact('categoria'));
});

Route::get('/mujeres/{categoria?}', function ($categoria = null) {
 return view('frontend.catalogo.mujeres', compact('categoria'));
});
*/

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

Route::get('/consultas', [ConsultaController::class, 'show'])
    ->name('consultas.show');
 Route::post('/consultas', [ConsultaController::class, 'store'])
    ->name('consultas.store');

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

//ver roles eliminados
Route::get('/roles-eliminados', [RolController::class, 'deleted'])
    ->name('roles.deleted');

//restaurar roles eliminados
Route::patch('/roles/{id}/restore', [RolController::class, 'restore'])
    ->name('roles.restore');

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
Route::patch('/usuarios/{id}/restore', [UserController::class, 'restore'])
     ->name('usuarios.restore');

Route::get('/usuarios-eliminados', [UserController::class, 'deleted'])
     ->name('usuarios.deleted');

//Rutas controlador CategoriaController
Route::resource('categorias', CategoriaController::class); 
Route::get(
    'categorias-eliminadas',
    [CategoriaController::class, 'deleted']
)->name('categorias.deleted');

Route::patch(
    'categorias/{id}/restore',
    [CategoriaController::class, 'restore']
)->name('categorias.restore');

//Rutas controlador ProductoController.

//ver productos eliminados
Route::get('productos-eliminados', [ProductoController::class, 'deleted'])
    ->name('productos.deleted');

//restaurar productos eliminados
Route::patch('productos/{id}/restore', [ProductoController::class, 'restore'])
    ->name('productos.restore');

Route::resource('productos', ProductoController::class);

//Rutas AuthController:
Route::get('/registro', [AuthController::class, 'formularioRegistro'])
    ->name('registro.form');

Route::post('/registro', [AuthController::class, 'registrar'])
    ->name('registro');

Route::get('/login', [AuthController::class, 'formularioLogin'])
    ->name('login.form');

Route::post('/login', [AuthController::class, 'autenticar'])
    ->name('login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

//Rutas para el controlador AdminController:
// Dashboard administrador
Route::get('/admin', [AdminController::class, 'dashboard'])
    ->middleware('admin')
    ->name('admin.dashboard');

Route::get('/admin/ventas', [AdminController::class, 'ventas'])
    ->middleware('admin')
    ->name('admin.ventas.index');

Route::get('/admin/ventas/{venta}', [AdminController::class, 'detalleVenta'])
    ->middleware('admin')
    ->name('admin.ventas.show');

Route::get('/admin/consultas', [ConsultaController::class, 'index'])
    ->middleware('admin')
    ->name('admin.consultas.index');

Route::post('/admin/consultas/{consulta}/estado', [ConsultaController::class, 'cambiarEstado'])
    ->middleware('admin')
    ->name('admin.consultas.estado');

//Rutas para el controlador ClienteController:
// Dashboard cliente
Route::get('/cliente', [ClienteController::class, 'dashboard'])
    ->middleware('cliente')
    ->name('cliente.dashboard');

Route::get('/mis-compras', [ClienteController::class, 'misCompras'])
    ->middleware('auth')
    ->name('cliente.compras');

Route::get('/mis-compras/{venta}', [ClienteController::class, 'detalleCompra'])
    ->middleware('auth')
    ->name('cliente.compras.detalle');

/* Ruta para la vista de los catálogos 'hombres, 'mujeres', 
   creados como Catálogo DINÁMICO para el backend*/
Route::get('/mujeres/{categoria?}', [CatalogoController::class, 'mujeres']);
Route::get('/hombres/{categoria?}', [CatalogoController::class, 'hombres']);

Route::middleware(['auth', 'cliente'])->group(function () {
    Route::get('/compra/confirmada', function () {
        return view('backend.carrito.confirmada');
    })->name('compra.confirmada');
    // Mostrar el carrito
    Route::get('/carrito', [CarritoController::class, 'index'])
        ->name('cliente.carrito');

    // Agregar un producto
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])
        ->name('carrito.agregar');

    // Eliminar un producto
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])
        ->name('carrito.eliminar');

    // Confirmar la compra
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])
        ->name('carrito.confirmar');

    // VER comprobante de una venta confirmada
    Route::get('/comprobante/{id}', [CarritoController::class, 'descargarComprobante'])
        ->name('comprobante.descargar');

    //DESCARGAR comprobante de una venta
    Route::get('/comprobante/{id}/pdf',[CarritoController::class, 'descargarPdf'])
        ->name('comprobante.pdf');

    //ENVIAR comprobante por al correo electrónico.
    Route::get('/comprobante/{id}/mail', [CarritoController::class, 'enviarComprobante'])
    ->name('comprobante.mail');   

});

Route::get('/comprobante-enviado', function () {
    return view('backend.carrito.comprobante.comprobante-enviado');
})->name('comprobante.enviado');


Route::middleware(['auth'])->group(function () {

    Route::get('/perfil', [PerfilController::class, 'show'])
        ->name('perfil.show');

    Route::get('/perfil/editar', [PerfilController::class, 'edit'])
        ->name('perfil.edit');

    Route::put('/perfil', [PerfilController::class, 'update'])
        ->name('perfil.update');

});
Route::middleware(['auth'])->group(function(){

    Route::get('/usuarios/{usuario}/compras',
    [UserController::class,'compras'])
    ->name('usuarios.compras');

});
Route::post('/consultas/{consulta}/responder', [ConsultaController::class, 'responder']);