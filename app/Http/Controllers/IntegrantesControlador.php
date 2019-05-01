<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Integrantes;
use Laravel\Http\Request\StoreTrainerRequest;

class IntegrantesControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $Integrantes =Integrantes::all();
    return view('Integrantes.index',compact('Integrantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Integrantes.create');
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
        $Integrantes= new Integrantes();

        $Integrantes->nombre=$request->input('name');
        $Integrantes->correo=$request->input('email');
        $Integrantes->img_url = $name;

        $Integrantes->save();

        return 'guardado';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Integrantes $Integrante)
    {
        return view('Integrantes.baja', compact('Integrante'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Integrantes $Integrante)
    {
       // $integrantes=Integrantes::where('nombre','=',$name)->firstOrFail();    
        return view('Integrantes.edit',compact('Integrante'));
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Integrantes $Integrante)
    {
        $Integrante->update($request->all());

        return redirect()->route('Integrantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Integrantes $Integrante)
    {
        $file_path=public_path().'/images/'.$Integrante->avatar;
        \File::delete($file_path);

        $Integrante->delete();
        return redirect()->route('Integrantes.index');
    }
}
