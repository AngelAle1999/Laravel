<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request as req;
use Laravel\Mobiliario;
use Hash;
use Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use File;
use Auth;
use DB;

class MobiliarioControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $mob = Mobiliario::all();
      return view('Plataforma.Mobiliario.index', compact('mob'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $a = new Mobiliario();
      // $pos = [];
      // for ($i=1; $i <= count(User::all()) + 1 ; $i++) {
      //   $pos[$i] = $i;
      // }
     $mobiliario = [
        'mob' => $a,
        // 'posiciones' => $pos
    ];
      // return $data;


      return view('Plataforma.Mobiliario.save ')->with($mobiliario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 $inputs = Request::all();
      // return $inputs;
      $rules = [
            'name' => 'required|min:4|alpha',
            'presentation' => 'required',
            'description' => 'required',
            'stock' => 'required|numeric',
            'img_src' => 'required',
            'price' => 'required|numeric',
 

        ];
      $messages = [ 
          'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
         'name.required' => 'Debes de llenar el campo nombre',
         'name.alpha' => 'El campo nombre solo puede contener texto',
         'presentation.required' => 'Debes de llenar el campo presentation',
         'description.required' => 'Debes de llenar el campo description',
         'stock.required' => 'Debes de llenar el campo stock',
         'stock.numeric' => 'El campo stock solo puede contener numeros',
         'img_src.required' => 'Debes de llenar el campo img_src',
         'price.required' => 'Debes de llenar el campo price',
         'price.numeric' => 'El campo price solo puede contener numeros',
        

      ];

         $validar = Validator::make($inputs, $rules, $messages);

      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $file = Request::file('img_src');
        $mob = Mobiliario::create($inputs);
        if($mob){
          session()->flash('success','Mobiliario Creado!');
        }else{
          session()->flash('notice','¡Ocurrio un error al crear el Mobiliario, intentalo de nuevo!');
        }

    return redirect()->to('Plataforma/mob'); 
    }}

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
    $edit = Mobiliario::findOrFail($id);
       $pos = [];
       for ($i=1; $i <= count(Mobiliario::all()) ; $i++) {
        $pos[$i] = $i;
       }
     $a = [
        'mob' => $edit,
        // 'posiciones' => $pos
    ];

    return view('Plataforma.Mobiliario.save')->with($a);
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
      $inputs = Request::all();
      // return $inputs;
      $rules = [
            'name' => 'required|min:4|alpha',
            'presentation' => 'required',
            'description' => 'required',
            'stock' => 'required|numeric',
            'img_src' => 'required',
            'price' => 'required|numeric',
  

        ];
      $messages = [ 
          'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
         'name.required' => 'Debes de llenar el campo nombre',
         'name.alpha' => 'El campo nombre solo puede contener texto',
         'presentation.required' => 'Debes de llenar el campo presentation',
         'description.required' => 'Debes de llenar el campo description',
         'stock.required' => 'Debes de llenar el campo stock',
         'stock.numeric' => 'El campo stock solo puede contener numeros',
         'img_src.required' => 'Debes de llenar el campo img_src',
         'price.required' => 'Debes de llenar el campo price',
         'price.numeric' => 'El campo price solo puede contener numeros',

      ];

         $validar = Validator::make($inputs, $rules, $messages);

      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $file = Request::file('img_src');
        $mob = Mobiliario::findOrFail($id);
        if($mob){
          session()->flash('success','Mobiliario Modificado!');
        }else{
          session()->flash('notice','¡Ocurrio un error al modificar el Mobiliario, intentalo de nuevo!');
        }
        $mob->fill($inputs)->save();

    return redirect()->to('Plataforma/mob'); 
    }}




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           Mobiliario::destroy($id);
            return redirect()->to('Plataforma/mob');    
    }
}
