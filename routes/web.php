<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function(){
    return view('auth.login');
});



// Rutas Clientes
Route::get('/clientes', 'ClienteController@listarClientes')->name('cliente.listar');
Route::get('/detalleCliente/{id}', 'ClienteController@detalleCliente')->name('cliente.detalle');
Route::get('/agregarCliente', 'ClienteController@agregarCliente')->name('agregarCliente');
Route::post('/agregarCliente', 'ClienteController@store')->name('agregarCliente');
Route::get('/editarCliente/{id}', 'ClienteController@edit')->name('cliente.editar');
Route::put('/editarCliente/{id}', 'ClienteController@update')->name('cliente.update');
Route::delete('/eliminarCliente/{id}', 'ClienteController@destroy')->name('cliente.destroy');
Route::get('/pdfClientes', 'ClienteController@pdfClientes')->name('PdfClientes');


// Rutas Usuarios
Route::get('usuarios', 'UserController@listarUsuario')->name('usuario.listar');
Route::get('/detalleUser/{id}', 'UserController@detalleUsuario')->name('usuario.detalle');
Route::get('/editarUser/{id}', 'UserController@edit')->name('usuario.editar');
Route::put('/editarUser/{id}', 'UserController@update')->name('usuario.update');
Route::get('/agregarUsuario', 'UserController@agregarUsuario')->name('agregarUsuario');
Route::post('/agregarUsuario', 'UserController@store')->name('agregarUsuario');
Route::get('/pdfUsuarios', 'UserController@pdfUsuarios')->name('PdfUsuarios');
Route::get('/habilitarUser/{id}', 'UserController@habilitar')->name('usuario.habilitacion');
Route::get('/inhabilitarUser/{id}', 'UserController@inhabilitar')->name('usuario.inhabilitacion');

// Rutas categorias
Route::get('/categorias', 'CategoriaController@listarCategorias')->name('categoria.listar');
Route::get('/detalleCategoria/{id}', 'CategoriaController@detalleCategoria')->name('categorias.detalle');
Route::get('/agregarCategoria', 'CategoriaController@agregarCategoria')->name('agregarCategoria');
Route::get('/editarCategoria/{id}', 'CategoriaController@edit')->name('categorias.editar');
Route::put('/editarCategoria/{id}', 'CategoriaController@update')->name('categoria.update');
Route::post('/agregarCategoria', 'CategoriaController@store')->name('agregarCategoria');
Route::get('/habilitarCategoria/{id}', 'CategoriaController@habilitar')->name('categoria.habilitacion');
Route::get('/inhabilitarCategria/{id}', 'CategoriaController@inhabilitar')->name('categoria.inhabilitacion');
Route::get('/pdfCategorias', 'CategoriaController@pdfCategorias')->name('PdfCategorias');

// Rutas del Producto
Route::get('/home', 'ClienteController@listarClientes')->name('home');
Route::get('productos', 'ProductoController@listarProductos')->name('producto.listar');
Route::get('/detalleProducto/{id}', 'ProductoController@detalleProducto')->name('producto.detalle');
Route::get('/agregarProducto', 'ProductoController@agregarProducto')->name('agregarProducto');
Route::get('/editarProducto/{id}', 'ProductoController@edit')->name('producto.editar');
Route::put('/editarProducto/{id}', 'ProductoController@update')->name('producto.update');
Route::post('/agregarProducto', 'ProductoController@store')->name('agregarProducto');
Route::get('/habilitarProducto/{id}', 'ProductoController@habilitar')->name('producto.habilitacion');
Route::get('/inhabilitarProducto/{id}', 'ProductoController@inhabilitar')->name('producto.inhabilitacion');
Route::get('/pdfProductos', 'ProductoController@pdfProductos')->name('PdfProductos');

// Rutas compras
Route::resource('compras', 'CompraController')->names('compras');
Route::get('change_status/compras/{compra}', 'CompraController@change_status')->name('change.status.compras');
Route::get('/pdfCompras', 'CompraController@pdfCompras')->name('PdfCompras');
Route::get('/pdfDetalle/{compra}', 'CompraController@pdfDetalle')->name('PdfDetalle');


// Rutas ventas
Route::resource('ventas', 'VentaController')->names('ventas');
Route::get('/habilitarVenta/{id}', 'VentaController@habilitar')->name('ventas.habilitacion');
Route::get('/inhabilitarVenta/{id}', 'VentaController@inhabilitar')->name('ventas.inhabilitacion');
Route::get('/pdfVentas', 'VentaController@pdfVentas')->name('PdfVentas');
Route::get('/pdfDetalleV/{venta}', 'VentaController@pdfDetalleV')->name('PdfDetalleV');

// Rutas Ayuda
Route::get('/ayuda', 'AyudaController@index')->name('ayuda.index');

