<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Req;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Request;
use Hash;
use File;
use Auth;

use App\Clientes;

class ClientesCtrl extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $clientes = Clientes::where('baja', '!=', '1')->get();
      $data = [
        'clientes' => $clientes,
      ];
      foreach ($data['clientes'] as $cliente) {
        $cliente->countCotizaciones;
      }
      return view('plataforma.clientes.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      $data = [
        'cliente' => new Clientes()
      ];
      return view('plataforma.clientes.save')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $inputs = Request::all();
      // return $inputs;
      $rules = [
      		'nombre' => 'required|min:4',
      		'telefono' => 'required|numeric|min:10|unique:clientes,telefono',
          'correo' => 'required|email|unique:clientes,correo',
	    ];
      $messages = [
          'required' => 'Creo que olvidaste escribir en este campo',
          'nombre.min' => 'Debes completar con al menos 4 caracteres',
          'telefono.min' => 'El teléfono debe contener al menos 10 caracteres',
          'telefono.unique' => 'El teléfono ya se encuentra registrado',
          'correo.unique' => 'El correo ya se encuentra registrado',
      ];
      $validar = Validator::make($inputs, $rules, $messages);
      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $cliente = Clientes::create($inputs);
        if($cliente){
          session()->flash('success','¡Cliente Creado!');
        }else{
          session()->flash('notice','¡Ocurrio un error al crear el cliente, intentalo de nuevo!');
        }
        return Redirect::to('plataforma/clientes');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
      return '<div style="text-align:center; margin-top: 20%; font-weight: 5; height: 10vh; font-size: 45px; font-family: "Raleway", sans-serif;">Jedis & Vulcans working together for your new web site<br>show<div>';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $data = [
        'cliente' => Clientes::findOrFail($id)
      ];
      return view('plataforma.clientes.save')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
      $inputs = Request::all();
      $rules = [
      		'nombre' => 'required|min:4',
      		'telefono' => 'required|numeric|min:9',
          'correo' => 'required|email',
	    ];
      $messages = [
          'required' => 'Creo que olvidaste escribir en este campo',
          'nombre.min' => 'Debes completar con al menos 4 caracteres',
          'correo.email' => 'Debes ingresar un correo válido'
      ];
      $validar = Validator::make($inputs, $rules, $messages);
      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $cliente = Clientes::findOrFail($id);
        if($cliente->fill($inputs)->save()){
          session()->flash('success','¡Cliente actualizado!');
        }else{
          session()->flash('notice','¡Ocurrio un error al actualizar la información del cliente, intentalo de nuevo!');
        }
        return Redirect::to('plataforma/clientes');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $cliente = Clientes::findOrFail($id);
      $cliente->cotizaciones;
      if(count($cliente['cotizaciones']) > 0){
        $cliente->baja = 1;
        $cliente->save();
      }else{
        $cliente->delete();
      }
      session()->flash('success','¡Cliente eliminado!');
      return Redirect::to('plataforma/clientes');
    }
}
