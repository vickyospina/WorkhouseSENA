<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function listarUsuario(){
        $usuarios = App\Usuario::all();
        $rols = App\Rol::all();
        return view('usuarios/listar',compact('usuarios','rols'));
      
    }
    public function listarClientes(){
        $clientes = App\Cliente::all();
        return view('clientes/listar',compact('clientes'));
    }

    public function listarCategorias(){
        $categorias = App\Categoria::all();
        return view('categorias/listar',compact('categorias'));
    }

    public function listarProductos(){
        $productos = App\Producto::all();
        $categorias = App\Categoria::all();
        return view('productos/listar',compact('productos','categorias'));
    }

    public function detalleUsuario($idUsuario){
        $usuario = App\Usuario::findOrFail($idUsuario);
        $rol = App\Rol::find($usuario->idRol);
        return view('usuarios.detalle', compact('usuario','rol'));
    }

    public function detalleCategoria($idCategoria){
        $categoria = App\Categoria::findOrFail($idCategoria);
        return view('categorias.detalle', compact('categoria'));
    }

    public function detalleProducto($idProducto){
        $producto = App\Producto::findOrFail($idProducto);
        $categoria = App\Categoria::find($producto->idCategoria);
        return view('productos.detalle', compact('producto','categoria'));
    }

    public function agregarUsuario(){
        $rols = App\Rol::all();
        return view('usuarios.create', compact('rols'));
    }

    public function agregarCliente(){
        return view('clientes.create');
    }

    public function agregarCategoria(){
        return view('categorias.create');
    }

    public function agregarProducto(){
        $categorias = App\Categoria::all();
        return view('productos.create', compact('categorias'));
    }

}
