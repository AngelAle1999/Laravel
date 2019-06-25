<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request as req;
use Laravel\User;
use Laravel\Roles;

use Hash;
use Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use File;
use Auth;
use DB;

class Usuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usua =User::all();
      return view('Plataforma.Usuarios.index', compact('usua'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $usua2 = new User();
      // $pos = [];
      // for ($i=1; $i <= count(User::all()) + 1 ; $i++) {
      //   $pos[$i] = $i;
      // }
     $usuarios = [
        'user' => $usua2,
        // 'posiciones' => $pos
    ];
      // return $data;
$roles =Roles::all();


    return view('Plataforma.Usuarios.save',compact('roles'))->with($usuarios);
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
          'email' => 'required|email|unique:users,email',
        'password' => 'required|min:4',
        'id_roles' => 'required',

        ];
      $messages = [ 
          'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
         'name.required' => 'Debes de llenar el campo nombre',
         'name.alpha' => 'El campo nombre solo puede contener texto',
          'email.unique' => 'El correo ya se encuentra registrado',
        'email.email' => 'El correo debe contener @, gmail. hotmail, com, etc ',
         'email.required' => 'Debes de llenar el campo correo',
        'password.min' => 'Debes completar con al menos 4 caracteres',
            'password.required' => 'Debes de llenar el campo contraseña',
         'id_roles.required' => 'Debes de llenar el campo id_roles',
      ];


      $validar = Validator::make($inputs, $rules, $messages);
          $inputs['password']=Hash::make($inputs['password']);

      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $user = User::create($inputs);
        if($user){
          session()->flash('success','Usuario Creado!');
        }else{
          session()->flash('notice','¡Ocurrio un error al crear el cliente, intentalo de nuevo!');
        }

    return redirect()->route('usua'); 
    //     $usua=$request->except(['_token','_method']);
    //     User::where('id',$id)->update($usua);
    //     return redirect()->route('usua');
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
     $edit = User::findOrFail($id);
       $pos = [];
       for ($i=1; $i <= count(User::all()) ; $i++) {
        $pos[$i] = $i;
       }
     $a = [
        'user' => $edit,
        // 'posiciones' => $pos
    ];
 $roles =Roles::all();


    return view('Plataforma.Usuarios.save',compact('roles'))->with($a);
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
            'name' => 'required|min:4|alpha',
          'email' => 'required|email',
        'password' => 'min:4',
        'id_roles' => 'required',

        ];
      $messages = [
         'name.required' => 'Debes de llenar el campo nombre',
          'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
         'name.alpha' => 'El campo nombre solo puede contener texto',
         'email.required' => 'Debes de llenar el campo correo',
        'email.email' => 'El correo debe contener @, gmail. hotmail, com, etc ',
        'password.min' => 'Debes completar con al menos 4 caracteres',
         'id_roles.required' => 'Debes de llenar el campo id_roles',
      ];

$validar = Validator::make($inputs, $rules, $messages);
          $inputs['password']=Hash::make($inputs['password']);

      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $user = User::findOrFail($id);
        if($user){
          session()->flash('success','Usuario Modificado!');
        }else{
          session()->flash('notice','¡Ocurrio un error al crear el cliente, intentalo de nuevo!');
        }
        $user->fill($inputs)->save();

    return redirect()->route('usua'); 
    //     $usua=$request->except(['_token','_method']);
    //     User::where('id',$id)->update($usua);
    //     return redirect()->route('usua');
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
        User::destroy($id);
            return redirect()->route('usua');    }
}
