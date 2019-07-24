<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request as req;
use Laravel\Plantilla;
use Hash;
use Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use File;
use Auth;
use DB;

class PlantillaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $plan =Plantilla::all();
      return view('Plataforma.Plantilla.index', compact('plan'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $a = new Plantilla();
      // $pos = [];
      // for ($i=1; $i <= count(User::all()) + 1 ; $i++) {
      //   $pos[$i] = $i;
      // }
     $plantilla = [
        'plan' => $a,
        // 'posiciones' => $pos
    ];
      // return $data;


      return view('Plataforma.Plantilla.save ')->with($plantilla);
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
            'type' => 'required|alpha',
            'baja' => 'required',
            'content' => 'required|alpha',

        ];
      $messages = [ 
          'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
         'name.required' => 'Debes de llenar el campo nombre',
         'name.alpha' => 'El campo nombre solo puede contener texto',
         'type.required' => 'Debes de llenar el campo type',
         'type.alpha' => 'El campo type solo puede contener texto',
         'baja.required' => 'Debes de llenar el campo baja',
         'content.required' => 'Debes de llenar el campo content',
         'content.alpha' => 'El campo content solo puede contener texto',
      ];

         $validar = Validator::make($inputs, $rules, $messages);

      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $plan = Plantilla::create($inputs);
        if($plan){
          session()->flash('success','Plantilla Creada!');
        }else{
          session()->flash('notice','¡Ocurrio un error al crear la Plantilla, intentalo de nuevo!');
        }

    return redirect()->to('Plataforma/plan'); 
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
      $edit = Plantilla::findOrFail($id);
       $pos = [];
       for ($i=1; $i <= count(Plantilla::all()) ; $i++) {
        $pos[$i] = $i;
       }
     $a = [
        'plan' => $edit,
        // 'posiciones' => $pos
    ];
 
    return view('Plataforma.Plantilla.save')->with($a);
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
            'type' => 'required|alpha',
            'baja' => 'required',
            'content' => 'required|alpha',

        ];
      $messages = [ 
          'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
         'name.required' => 'Debes de llenar el campo nombre',
         'name.alpha' => 'El campo nombre solo puede contener texto',
         'type.required' => 'Debes de llenar el campo type',
         'type.alpha' => 'El campo type solo puede contener texto',
         'baja.required' => 'Debes de llenar el campo baja',
         'content.required' => 'Debes de llenar el campo content',
         'content.alpha' => 'El campo content solo puede contener texto',
      ];

         $validar = Validator::make($inputs, $rules, $messages);

      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $plan = Plantilla::findOrFail($id);
        if($plan){
          session()->flash('success','Plantilla Modificada!');
        }else{
          session()->flash('notice','¡Ocurrio un error al modificar la Plantilla, intentalo de nuevo!');
        }
        $plan->fill($inputs)->save();

    return redirect()->to('Plataforma/plan'); 
    }}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Plantilla::destroy($id);
            return redirect()->to('Plataforma/plan');    
    }
}
