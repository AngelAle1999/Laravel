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
      $usuar =User::all();
      $usua = DB::table('users')
            ->join('roles', 'users.id_roles', '=', 'roles.id_roles')
            ->get();
      return view('Plataforma.Usuarios.Index', compact('usua'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $usua2 = new User();
      $usuarios = ['user' => $usua2];
      
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
                  'name' => 'required|min:4',
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
                    'password.min' => 'Debes completar con al menos 4 caracteres el campo password',
                    'password.required' => 'Debes de llenar el campo contraseña',
                    'id_roles.required' => 'Debes de llenar el campo id_roles',
                  ];


      $validar = Validator::make($inputs, $rules, $messages);
      $inputs['password']=Hash::make($inputs['password']);

      if($validar->fails())
      {
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }
      else
      {
        $user = User::create($inputs);
        if($user)
        {
          session()->flash('success','Usuario Creado!');
        }
        else
        {
          session()->flash('notice','¡Ocurrio un error al crear el Usuario, intentalo de nuevo!');
        }

        return redirect()->to('Plataforma/usua'); 
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
      $a = ['user' => $edit];
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
                  'name' => 'required|min:4',
                  'email' => 'required|email',
                  'id_roles' => 'required'
                ];
      $messages = [
                    'name.required' => 'Debes de llenar el campo nombre',
                    'name.min' => 'Debes completar con al menos 4 caracteres el campo nombre',
                    'name.alpha' => 'El campo nombre solo puede contener texto',
                    'email.required' => 'Debes de llenar el campo correo',
                    'email.email' => 'El correo debe contener @, gmail. hotmail, com, etc ',
                    'id_roles.required' => 'Debes de llenar el campo id_roles',
                  ];

      $validar = Validator::make($inputs, $rules, $messages);
      if(isset($inputs['password']))
      {
        $inputs['password']=Hash::make($inputs['password']);
        
        if($validar->fails())
        {
          return Redirect::back()->withInput(Request::all())->withErrors($validar);
        }
        else
        {
          $user = User::findOrFail($id);
          if($user)
          {
            session()->flash('success','Usuario Modificado!');
          }
          else
          {
            session()->flash('notice','¡Ocurrio un error al modificar el usuario, intentalo de nuevo!');
          }
          $user->fill($inputs)->save();

          return redirect()->to('Plataforma/usua'); 

        }
      }
      else
      {
        if($validar->fails())
        {
          return Redirect::back()->withInput(Request::all())->withErrors($validar);
        }
        else
        {

          $user = DB::table('users')
            ->where('id_user',$id)
            ->update(['name'=>$inputs['name'],'email'=>$inputs['email'],'id_roles'=>$inputs['id_roles']]);

          session()->flash('success','Usuario Modificado!');
         

          return redirect()->to('Plataforma/usua');
        }
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
      return redirect()->to('Plataforma/usua');    
    }
}
