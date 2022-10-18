<?php

use App\Http\Controllers\ProductoController;
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

Route::get('/producto/{index}', [ProductoController::class, "listByID"]) -> name("verProducto");
Route::get('/productos/nuevo', function () { return view("producto.nuevo");}) -> name("crearProducto");
Route::post('/productos/nuevo', [ProductoController::class, "Create"]) -> name("crearProducto");
Route::get('/productos', [ProductoController::class, "listAll"]) -> name("productos");
