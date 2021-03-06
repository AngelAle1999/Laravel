<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Servicios;
use Laravel\Http\Request\StoreTrainerRequest;

class ServiciosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Servicios =Servicios::all();
    return view('Servicios.index',compact('Servicios'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          if($request->hasFile('avatar')) {$file = $request->file('avatar');
        $name = time().$file->getClientOriginalName(); $file->move(public_path().'/images/', $name);}
        $Servicios= new Servicios();

        $Servicios->nombre=$request->input('name');
        $Servicios->posicion=$request->input('Posicion');
        $Servicios->img_url = $name;

        $Servicios->save();

        return 'guardado';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Servicios $Servicio)
    {
      return view('Servicios.baja', compact('Servicio')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicios $Servicio)
    {
        return view('Servicios.edit',compact('Servicio'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicios $Servicio)
    {
         $Servicio->update($request->all());

        return redirect()->route('Servicios.index');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicios $Servicio)
    {
       $file_path=public_path().'/images/'.$Servicio->avatar;
        \File::delete($file_path);

        $Servicio->delete();
        return redirect()->route('Servicios.index');
    }
}
