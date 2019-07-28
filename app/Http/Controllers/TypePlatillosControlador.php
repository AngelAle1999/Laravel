<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request as req;
use Laravel\TypePlatillos;
use Hash;
use Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use File;
use Auth;
use DB;

class TypePlatillosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 $tpla = TypePlatillos::all();
      return view('Plataforma.TypePlatillos.index', compact('tpla'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $a = new TypePlatillos();
      // $pos = [];
      // for ($i=1; $i <= count(User::all()) + 1 ; $i++) {
      //   $pos[$i] = $i;
      // }
     $platillo = [
        'tpla' => $a,
        // 'posiciones' => $pos
    ];
      // return $data;


      return view('Plataforma.TypePlatillos.save ')->with($platillo);
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
            'img_src' => 'required',
            'description' => 'required|min:4',


        ];
      $messages = [ 
          'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
         'name.required' => 'Debes de llenar el campo nombre',
         'name.alpha' => 'El campo nombre solo puede contener texto',
         'img_src.required' => 'Debes de llenar el campo img_src',
          'description.min' => 'Debes completar con al menos 4 caracteres el campo description',
         'description.required' => 'Debes de llenar el campo description',
      ];

         $validar = Validator::make($inputs, $rules, $messages);

      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $file = Request::file('img_src');
        $tpla = TypePlatillos::create($inputs);
        if($tpla){
          session()->flash('success','Platillo Creado!');
        }else{
          session()->flash('notice','¡Ocurrio un error al crear el Platillo, intentalo de nuevo!');
        }

    return redirect()->to('Plataforma/tpla'); 
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
    $tedit = TypePlatillos::findOrFail($id);
       $pos = [];
       for ($i=1; $i <= count(TypePlatillos::all()) ; $i++) {
        $pos[$i] = $i;
       }
     $a = [
        'tpla' => $tedit,
        // 'posiciones' => $pos
    ];

    return view('Plataforma.TypePlatillos.save')->with($a);
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
            'img_src' => 'required',
            'description' => 'required|min:4',


        ];
      $messages = [ 
          'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
         'name.required' => 'Debes de llenar el campo nombre',
         'name.alpha' => 'El campo nombre solo puede contener texto',
         'img_src.required' => 'Debes de llenar el campo img_src',
          'description.min' => 'Debes completar con al menos 4 caracteres el campo description',
         'description.required' => 'Debes de llenar el campo description',
      ];
         $validar = Validator::make($inputs, $rules, $messages);

      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $file = Request::file('img_src');
        $tpla = TypePlatillos::findOrFail($id);
        if($tpla){
          session()->flash('success','Platillo Modificado!');
        }else{
          session()->flash('notice','¡Ocurrio un error al modificar el Platillo, intentalo de nuevo!');
        }
        $tpla->fill($inputs)->save();

    return redirect()->to('Plataforma/tpla'); 
    }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          TypePlatillos::destroy($id);
            return redirect()->to('Plataforma/tpla');    
    }
}
