<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function Create(Request $request){
        $validateProduct = $request->validate([
            'Nombre' => 'required|max:255',
            'Marca' => 'required|max:255',
            'Descripcion' => 'required',
            'Stock' => 'required|numeric|min:-1',
        ]);

        Producto::create([
            'Nombre' => $request -> post('Nombre'),
            'Marca' => $request -> post('Marca'),
            'Descripcion' => $request -> post("Descripcion"),
            'Stock' => $request -> post('Stock')
        ]);
        return redirect()->route("home");
    }

    public function listByID(Producto $index){
        $Producto = Producto::findOrFail($index -> id) -> first();
        
        return view('producto.listar', ['Producto' => $Producto]);
    }

    public function listAll(){
        $Productos = Producto::get();
        return view('producto.inicio', ['Productos' => $Productos]);
    }

    public function Delete(Producto $index){
        try {
            $Producto = Producto::destroy($index);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
           return view("producto.inicio", ['Eliminado' => true]);
       }

    }
}
