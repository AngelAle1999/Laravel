<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\User;

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
    return view('plataforma.Usuarios.save')->with($usuarios);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usua= new User();

        $usua->name=$request->input('name');
        $usua->email=$request->input('email');
        $usua->password=$request->input('password');
        $usua->id_roles=$request->input('id_roles');

        $usua->save();

return redirect()->route('usua'); 
    //     $usua=$request->except(['_token','_method']);
    //     User::where('id',$id)->update($usua);
    //     return redirect()->route('usua');
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
      // return $data;
    return view('plataforma.Usuarios.save')->with($a);
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
      $updat=User::findOrFail($id);
      $datos = [
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => $request['password'],
        'id_roles' => $request['id_roles']
    ];
    $updat->fill($datos)->save();
    return redirect()->route('usua');    }

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
