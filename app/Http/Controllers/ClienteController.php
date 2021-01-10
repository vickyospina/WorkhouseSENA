<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idCliente)
    {
        $cliente = App\Cliente::findOrFail($idCliente);
        return view('clientes.detalle', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idUsuario'=>'required',
            'tipoIdentificacion'=>'required',
            'numeroIdentificacion'=>'required',
            'nombreCliente'=>'required',
            'telefonoFijo'=>'required',
            'celular'=>'required',
            'direccion'=>'required',
        ]);

        $clienteNuevo = new App\Cliente;
        $clienteNuevo->id = $request->id;
        $clienteNuevo->idUsuario = $request->idUsuario;
        $clienteNuevo->nombreCliente = $request->nombreCliente;
        $clienteNuevo->tipoIdentificacion = $request->tipoIdentificacion;
        $clienteNuevo->numeroIdentificacion = $request->numeroIdentificacion;
        $clienteNuevo->telefonoFijo = $request->telefonoFijo;
        $clienteNuevo->celular = $request->celular;
        $clienteNuevo->direccion = $request->direccion;

        $clienteNuevo->save();
        return redirect('/clientes')->with('success','Registro Exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = App\Cliente::findOrFail($id);
        return view('clientes.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente= App\Cliente::findOrFail($id); //buscar producto por id
        $cliente->id = $request->id;
        $cliente->idUsuario = $request->idUsuario;
        $cliente->nombreCliente = $request->nombreCliente;
        $cliente->tipoIdentificacion = $request->tipoIdentificacion;
        $cliente->numeroIdentificacion = $request->numeroIdentificacion;
        $cliente->telefonoFijo = $request->telefonoFijo;
        $cliente->celular = $request->celular;
        $cliente->direccion = $request->direccion;
           $cliente->save();
           
           return redirect('/clientes')->with('Mensaje', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}