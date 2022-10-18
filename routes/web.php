<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ProductoController::class, "listAll"]) -> name("home");

Route::get('/inicio', [ProductoController::class, "listAll"]) -> name("home");

Route::get('/login', function () { return view('usuario.login'); }) -> name("login") -> middleware("guest");
Route::post('/login', [UserController::class, "Login"]) -> name("login") -> middleware("guest");

Route::get('/registro', function () { return view('usuario.registrar'); }) -> name("registrarse") -> middleware("guest");
Route::post('/registro', [UserController::class, "Register"]) -> name("registrarse") -> middleware("guest");

Route::get('/user/logout', [UserController::class, "Logout"]) -> name("logout") -> middleware("auth");


Route::get('/producto/{index}', [ProductoController::class, "listByID"]) -> name("verProducto") -> middleware("guest");
Route::get('/productos/nuevo', function () { return view("producto.nuevo");}) -> name("crearProducto") -> middleware("auth");
Route::post('/productos/nuevo', [ProductoController::class, "Create"]) -> name("crearProducto") -> middleware("auth");
Route::get('/productos', [ProductoController::class, "listAll"]) -> name("productos") -> middleware("guest");

Route::get('/producto/borrar/{index}', [ProductoController::class, "Delete"]) -> name("borrarProducto") -> middleware("auth");