<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;

class ProductosController extends Controller
{
    
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index',compact('productos'));
    }

    
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.crear',compact('categorias'));
    }

    
    public function store(Request $request)
    {
        //PASO 1: Validar los campos
        $request->validate([
            'nombre' => 'required|unique:productos|max:100',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'imagen' => 'mimes:jpeg,bmp,png',
            'categoria_id' => 'required'
        ]);

        //PASO 2: Subir la imagen al servidor
        $nombreimg = "";
        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $ruta = public_path().'/imgproductos';
            $nombreimg = uniqid()."-".$imagen->getClientOriginalName();
            $imagen->move($ruta,$nombreimg);
        }

        //PASO 3: Insertar la info en la tabla Producto
        $producto = Producto::create([
            'nombre'=>$request->nombre,
            'precio'=>$request->precio,
            'descripcion'=>$request->descripcion,
            'imagen'=>$nombreimg,
            'categoria_id'=>$request->categoria_id
        ]);

        return redirect()->route('productos.index');
    }

    
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
