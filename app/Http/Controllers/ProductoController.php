<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
use App\Producto;
use App\Categoria;
use Barryvdh\DomPDF\Facade as PDF;


class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:agregarProducto')->only(['agregarProducto','store']);
        $this->middleware('can:producto.listar')->only(['listarProductos']);
        $this->middleware('can:producto.editar')->only(['edit','update']);
        $this->middleware('can:producto.detalle')->only(['detalleProducto']);
        $this->middleware('can:producto.habilitacion')->only(['habilitar']);
        $this->middleware('can:producto.inhabilitacion')->only(['inhabilitar']);
        

    }

    public function listarProductos(){
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('productos/listar',compact('productos','categorias'));
    }

    public function agregarProducto()
    {
        $categorias = Categoria::where('estado', 'Activo')->get();
        return view('productos.create', compact('categorias'));
    }

    
    public function store(Request $request)
    {
       
        $request->validate([
            'idCategoria'=>'required',
            'nombreProducto'=>'required|unique:productos',
            'existencias'=>'required',
            'medida'=>'required',
            'valorProducto'=>'required',
        ],

    [
            'idCategoria.required' => '*Rellena este campo',
            'nombreProducto.required' => '*Rellena este campo',
            'nombreProducto.unique' => '*Producto ya registrado',
            'existencias.required' => '*Rellena este campo',
            'medida.required' => '*Rellena este campo',
            'valorProducto.required' => '*Rellena este campo',
         
          
        ]
    );
        $productoNuevo = new App\Producto;
        $productoNuevo->idCategoria = $request->idCategoria;
        $productoNuevo->nombreProducto = $request->nombreProducto;
        $productoNuevo->existencias = $request->existencias;
        $productoNuevo->medida = $request->medida;
        $productoNuevo->valorProducto = $request->valorProducto;
        $productoNuevo->Estado = $request->estado;

        $productoNuevo->save();
        return redirect('/productos')->with('success','Registro Exitoso');
    }

    public function detalleProducto($idProducto)
    {
        $producto = App\Producto::findOrFail($idProducto);
        $categoria = App\Categoria::find($producto->idCategoria);
        return view('productos.detalle', compact('producto','categoria'));
    }

   
    public function edit($idProducto)
    {
        $producto = App\Producto::findOrFail($idProducto);
        $categorias = App\Categoria::all();
        return view('productos.editar', compact('producto','categorias'));
    }

    public function update(Request $request,  $id)
    {

        $request->validate([
            'idCategoria'=>'required',
            'nombreProducto'=>'required',
            'existencias'=>'required',
            'medida'=>'required',
            'valorProducto'=>'required',
        ],

    [
            'idCategoria.required' => '*Rellena este campo',
            'nombreProducto.required' => '*Rellena este campo',
            'existencias.required' => '*Rellena este campo',
            'medida.required' => '*Rellena este campo',
            'valorProducto.required' => '*Rellena este campo',
         
          
        ]
    );

        $producto= App\Producto::findOrFail($id); //buscar producto por id
        $producto->idCategoria = $request->idCategoria;
        $producto->nombreProducto = $request->nombreProducto;
        $producto->existencias = $request->existencias;
        $producto->medida = $request->medida;
        $producto->valorProducto = $request->valorProducto;
        $producto->save();
           
           return redirect('/productos')->with('Mensaje', 'Producto actualizado');
    }

    public function habilitar(Request $request, $id)
    {
           $producto= App\Producto::findOrFail($id); //buscar producto por id
           $producto->Estado="Activo";
           $producto->update();
           
           return redirect('/productos')->with('Mensaje', 'Producto actualizado');
    }

    public function inhabilitar(Request $request, $id)
    {
           $producto= App\Producto::findOrFail($id); //buscar producto por id
           $producto->Estado="Inactivo";
           $producto->update();
           
           return redirect('/productos')->with('Mensaje', 'Producto actualizado');
    }
    public function pdfProductos()
    {
       $productos = Producto::all();
       $categorias = Categoria::all();
        $pdf = PDF::loadView('productos.pdf',compact('productos','categorias'))->setOptions(['defaultFont' => 'sans-serif']); 
        return $pdf->stream('productos.pdf');
    }
   
}