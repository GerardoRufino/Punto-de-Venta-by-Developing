<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route("home");
});
Route::get("/acerca-de", function () {
    return view("misc.acerca_de");
})->name("acerca_de.index");
Route::get("/soporte", function(){
    return redirect("https://parzibyte.me/blog/contrataciones-ayuda/");
})->name("soporte.index");

Auth::routes([
    "reset" => false,// no pueden olvidar contraseña
]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('checkRole:admin');
Route::get('/home', 'HomeController@index')->name('home');
// Permitir logout con petición get
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->route("home");
})->name("logout");


Route::middleware("auth")
    ->group(function () {
        Route::resource("clientes", "ClientesController");
        Route::resource("distribuidores", "DistribuidoresController");
        Route::resource("usuarios", "UserController")->parameters(["usuarios" => "user"]);
        Route::resource("productos", "ProductosController");
        Route::get('/editar-producto/{id}', 'ProductosController@edit');
        Route::get("/ventas/ticket", "VentasController@ticket")->name("ventas.ticket");
        Route::resource("ventas", "VentasController");
        Route::resource("compras", "ComprasController");
        Route::get('pdf', 'VentasController@PDF');
        Route::get("/vender", "VenderController@index")->name("vender.index")->middleware('checkRole:user');
        Route::post("/productoDeVenta", "VenderController@agregarProductoVenta")->name("agregarProductoVenta");
        Route::delete("/productoDeVenta", "VenderController@quitarProductoDeVenta")->name("quitarProductoDeVenta");
        Route::post("/terminarOCancelarVenta", "VenderController@terminarOCancelarVenta")->name("terminarOCancelarVenta");
        

    });
    Route::get('/admin', [AdminController::class,'index'])
    ->middleware('auth.admin')
    ->name('admin.index');