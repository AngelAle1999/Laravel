<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request as req;
use Laravel\Platillo;
use Hash;
use Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use File;
use Auth;
use DB;

class PlatilloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platillos = Platillo::all();
        return view('Plataforma.Platillo.index', compact('platillos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platilloModel = new Platillo();

        $platillo = ['platillo' => $platilloModel];
        return view('Plataforma.Platillo.save')->with($platillo);
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
        $rules = [
                'name'=>'required|min:4',
                'img_url'  => 'required',
                'status'=> 'required',
                'descripcion' => 'required',
                'price'  => 'required|numeric',
                'amount'  => 'required|numeric',
                'infant_price'  => 'required|numeric',
                'type_id'  => 'required|numeric',
                'condition_number_people_1' => 'required|numeric',
                'price_number_people_1' => 'required|numeric',
                'condition_number_people_2' => 'required|numeric',
                'price_number_people_2' => 'required|numeric',
                'condition_amount_1' => 'required|numeric',
                'price_amount_1' => 'required|numeric',
                'condition_amount_2' => 'required|numeric',
                'price_amount_2' => 'required|numeric',
                ];

        $messages = [ 
                'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
                'name.required' => 'Debes de llenar el campo name',
                'img_url.required' => 'Debes de llenar el campo img_url',
                'status.required'=> 'Debes de llenar el campo status',
                'descripcion.required' => 'Debes de llenar el campo description',
                'price.required' => 'Debes de llenar el campo price',
                'price.numeric' => 'El campo price solo puede contener numeros',
                'amount.required' => 'Debes de llenar el campo amount',
                'amount.numeric' => 'El campo amount solo puede contener numeros',
                'infant_price.required' => 'Debes de llenar el campo infant_price',
                'infant_price.numeric' => 'El campo infant_price solo puede contener numeros',
                'type_id.required' => 'Debes de llenar el campo type_id',
                'type_id.numeric' => 'El campo type_id solo puede contener numeros',
                'condition_number_people_1.required' => 'Debes de llenar el campo condition_number_people_1',
                'condition_number_people_1.numeric' => 'El campo condition_number_people_1 solo puede contener numeros',
                'price_number_people_1.required' => 'Debes de llenar el campo price_number_people_1',
                'price_number_people_1.numeric' => 'El campo price_number_people_1 solo puede contener numeros',
                'condition_number_people_2.required' => 'Debes de llenar el campo condition_number_people_2',
                'condition_number_people_2.numeric' => 'El campo condition_number_people_2 solo puede contener numeros',
                'price_number_people_2.required' => 'Debes de llenar el campo price_number_people_2',
                'price_number_people_2.numeric' => 'El campo price_number_people_2 solo puede contener numeros',
                'condition_amount_1.required' => 'Debes de llenar el campo condition_amount_1',
                'condition_amount_1.numeric' => 'El campo condition_amount_1 solo puede contener numeros',
                'price_amount_1.required' => 'Debes de llenar el campo price_amount_1',
                'price_amount_1.numeric' => 'El campo price_amount_1 solo puede contener numeros',
                'condition_amount_2.required' => 'Debes de llenar el campo condition_amount_2',
                'condition_amount_2.numeric' => 'El campo condition_amount_2 solo puede contener numeros',
                'price_amount_2.required' => 'Debes de llenar el campo price_amount_2',
                'price_amount_2.numeric' => 'El campo price_amount_2 solo puede contener numeros',
                ];

        $validar = Validator::make($inputs, $rules, $messages);

          if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $file = Request::file('img_src');
        if($file){
          $platillo = Platillo::create($inputs);
          $archivo = "";
          $extension = $file->getClientOriginalExtension();
          $id = $platillo->id_platillo;
          $archivo = "img/id_platillo".$id.".".$extension;

          if($file->move("img/Platillo", $archivo)){
            $platillo->img_src = $archivo;
            $platillo->save();
            session()->flash('success','Platillo Creado!');
                return redirect()->to('Plataforma/platillo'); 
          }
        }else{
          session()->flash('notice','¡Ocurrio un error al crear el Platillo, intentalo de nuevo!');
        }

    return redirect()->to('Plataforma/platillo'); 
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
        $edit = Platillo::findOrFail($id);
        $pos = [];
        for ($i=1; $i <= count(Platillo::all()) ; $i++)
        {
            $pos[$i] = $i;
        }
        $a = ['platillo' => $edit];

        return view('Plataforma.Platillo.save')->with($a);
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
        
        $rules = [
                'name'=>'required|min:4',
                'img_url'  => 'required',
                'status'=> 'required',
                'descripcion' => 'required',
                'price'  => 'required|numeric',
                'amount'  => 'required|numeric',
                'infant_price'  => 'required|numeric',
                'type_id'  => 'required|numeric',
                'condition_number_people_1' => 'required|numeric',
                'price_number_people_1' => 'required|numeric',
                'condition_number_people_2' => 'required|numeric',
                'price_number_people_2' => 'required|numeric',
                'condition_amount_1' => 'required|numeric',
                'price_amount_1' => 'required|numeric',
                'condition_amount_2' => 'required|numeric',
                'price_amount_2' => 'required|numeric',
                ];

        $messages = [ 
                'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
                'name.required' => 'Debes de llenar el campo name',
                'img_url.required' => 'Debes de llenar el campo img_url',
                'status.required'=> 'Debes de llenar el campo status',
                'descripcion.required' => 'Debes de llenar el campo description',
                'price.required' => 'Debes de llenar el campo price',
                'price.numeric' => 'El campo price solo puede contener numeros',
                'amount.required' => 'Debes de llenar el campo amount',
                'amount.numeric' => 'El campo amount solo puede contener numeros',
                'infant_price.required' => 'Debes de llenar el campo infant_price',
                'infant_price.numeric' => 'El campo infant_price solo puede contener numeros',
                'type_id.required' => 'Debes de llenar el campo type_id',
                'type_id.numeric' => 'El campo type_id solo puede contener numeros',
                'condition_number_people_1.required' => 'Debes de llenar el campo condition_number_people_1',
                'condition_number_people_1.numeric' => 'El campo condition_number_people_1 solo puede contener numeros',
                'price_number_people_1.required' => 'Debes de llenar el campo price_number_people_1',
                'price_number_people_1.numeric' => 'El campo price_number_people_1 solo puede contener numeros',
                'condition_number_people_2.required' => 'Debes de llenar el campo condition_number_people_2',
                'condition_number_people_2.numeric' => 'El campo condition_number_people_2 solo puede contener numeros',
                'price_number_people_2.required' => 'Debes de llenar el campo price_number_people_2',
                'price_number_people_2.numeric' => 'El campo price_number_people_2 solo puede contener numeros',
                'condition_amount_1.required' => 'Debes de llenar el campo condition_amount_1',
                'condition_amount_1.numeric' => 'El campo condition_amount_1 solo puede contener numeros',
                'price_amount_1.required' => 'Debes de llenar el campo price_amount_1',
                'price_amount_1.numeric' => 'El campo price_amount_1 solo puede contener numeros',
                'condition_amount_2.required' => 'Debes de llenar el campo condition_amount_2',
                'condition_amount_2.numeric' => 'El campo condition_amount_2 solo puede contener numeros',
                'price_amount_2.required' => 'Debes de llenar el campo price_amount_2',
                'price_amount_2.numeric' => 'El campo price_amount_2 solo puede contener numeros',
                ];

        $validar = Validator::make($inputs, $rules, $messages);

         if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $file = Request::file('img_src');
        if($file){
        $platillo = Platillo::findOrFail($id);
          $archivo = "";
          $extension = $file->getClientOriginalExtension();
          $id = $platillo->id_platillo;
          $archivo = "img/id_platillo".$id.".".$extension;

          if($file->move("img/Platillo", $archivo)){
            $platillo->img_src = $archivo;
            $platillo->save();
            session()->flash('success','Platillo Modificado!');
                return redirect()->to('Plataforma/platillo'); 
          }
        }else{
          session()->flash('notice','¡Ocurrio un error al crear el Platillo, intentalo de nuevo!');
        }

    return redirect()->to('Plataforma/platillo'); 
    }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Platillo::destroy($id);
        return redirect()->to('Plataforma/platillo');
    }
}
