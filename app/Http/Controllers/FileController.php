<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request as req;
use Laravel\File;
use Hash;
use Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use File as archivo;
use Auth;
use DB;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return view('Plataforma.File.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fileModel = new File();

        $file = ['file' => $fileModel];
        return view('Plataforma.File.save')->with($file);
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
                'name'=>'required|min:4|alpha',
                'description' => 'required|alpha',
                'url'  => 'required',
                'type'  => 'required|numeric',
                'baja' => 'required'
                ];

        $messages = [ 
                'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
                'name.required' => 'Debes de llenar el campo name',
                'name.alpha' => 'El campo name solo puede contener texto',
                'description.required' => 'Debes de llenar el campo description',
                'description.alpha' => 'El campo description solo puede contener texto',
                'url.required' => 'Debes de llenar el campo url',
                'type.required' => 'Debes de llenar el campo type',
                'type.numeric' => 'El campo type solo puede contener numeros',
                'baja.required' => 'Debes de llenar el campo baja'
                ];

        $validar = Validator::make($inputs, $rules, $messages);

        if($validar->fails())
        {
            return Redirect::back()->withInput(Request::all())->withErrors($validar);
        }
        else
        {
            $file = Request::file('url');
            $file = File::create($inputs);
            if($file){
            session()->flash('success','file Creado!');
        }
        else
        {
            session()->flash('notice','¡Ocurrio un error al crear el file, intentalo de nuevo!');
        }

        return redirect()->to('Plataforma/file'); 
        }
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
        $edit = File::findOrFail($id);
        $pos = [];
        for ($i=1; $i <= count(File::all()) ; $i++)
        {
            $pos[$i] = $i;
        }
        $a = ['file' => $edit];

        return view('Plataforma.File.save')->with($a);
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
                'name'=>'required|min:4|alpha',
                'description' => 'required|alpha',
                'url'  => 'required',
                'type'  => 'required|numeric',
                'baja' => 'required'
                ];

        $messages = [ 
                'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
                'name.required' => 'Debes de llenar el campo name',
                'name.alpha' => 'El campo name solo puede contener texto',
                'description.required' => 'Debes de llenar el campo description',
                'description.alpha' => 'El campo description solo puede contener texto',
                'url.required' => 'Debes de llenar el campo url',
                'type.required' => 'Debes de llenar el campo type',
                'type.numeric' => 'El campo type solo puede contener numeros',
                'baja.required' => 'Debes de llenar el campo baja'
                ];

        $validar = Validator::make($inputs, $rules, $messages);

        if($validar->fails())
        {
            return Redirect::back()->withInput(Request::all())->withErrors($validar);
        }
        else
        {
            $file = Request::file('url');
            $file = File::findOrFail($id);
            if($file)
            {
                session()->flash('success','File Modificado!');
            }
            else
            {
                session()->flash('notice','¡Ocurrio un error al modificar el File, intentalo de nuevo!');
            }
            $file->fill($inputs)->save();

        return redirect()->to('Plataforma/file');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        File::destroy($id);
        return redirect()->to('Plataforma/file');
    }
}
