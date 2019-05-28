<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Req;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Banner;
use Request;
use File;

class BannerCtrl extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $data = [
        'banners' => Banner::all(),
      ];
      // return $data;
      return view('plataforma.banner.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      $datos = new Banner();
      $pos = [];
      for ($i=1; $i <= count(Banner::all()) + 1 ; $i++) {
        $pos[$i] = $i;
      }
      $data = [
        'banner' => $datos,
        'posiciones' => $pos
      ];
      // return $data;
      return view('plataforma.banner.save')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Req $request){
      $inputs = Request::all();
      // return $inputs;
      $rules = [
          'titulo' => 'required|min:2'
      ];
      $messages = [
          'required' => 'Creo que olvidaste escribir en este campo',
          'min' => 'Debes completar con al menos 2 caracteres'
      ];
      $validar = Validator::make($inputs, $rules, $messages);
      Request::flash();
      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $file = Request::file('imagen');
        if($file){

          $bannersSamePos = Banner::where('pos', $inputs['pos'])->get();
          if(count($bannersSamePos) > 0){
            foreach ($bannersSamePos as $bann) {
              $bann->pos = count(Banner::all()) + 1 ;
              $bann->save();
            }
          }

          $dataBanner = [
            'titulo' => $inputs['titulo'],
            'imagen' => '',
            // 'redirigir' => $inputs['redirigir'],
            'pos' => $inputs['pos']
          ];
          $banner = Banner::create($dataBanner);

          $archive = "";
          $extension = $file->getClientOriginalExtension();
          $id = $banner->id_banner;
          $archive = "img/banner/banner".$id.".".$extension;

          if($file->move("img/banner", $archive)){
            $banner->imagen = $archive;
            $banner->save();
            session()->flash('success','Banner creado!');
            return Redirect::to('plataforma/banner');
          }else{
            session()->flash('notice','Ocurrió un error al subir la imagen!');
            return Redirect::to('plataforma/banner');
          }


        }else{
          session()->flash('notice','No se encontró la imagen!');
          return Redirect::to('plataforma/banner');
        }

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return "Vulcans & Jedis workging togheter for your new web site show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $datos = Banner::findOrFail($id);
      $pos = [];
      for ($i=1; $i <= count(Banner::all()) ; $i++) {
        $pos[$i] = $i;
      }
      $data = [
        'banner' => $datos,
        'posiciones' => $pos
      ];
      // return $data;
      return view('plataforma.banner.save')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Req $request, $id){
      $inputs = Request::all();
      // return $inputs;
      $rules = [
        'titulo' => 'required|min:2'
      ];
      $messages = [
          'required' => 'Creo que olvidaste escribir en este campo',
          'min' => 'Debes completar con al menos 2 caracteres'
      ];
      $validar = Validator::make($inputs, $rules, $messages);
      Request::flash();
      if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
      }else{
        $file = Request::file('imagen');
        $banner = Banner::findOrFail($id);
        if($file){

          $archive = "";
          $extension = $file->getClientOriginalExtension();
          $id = $banner->id_banner;
          $archive = "img/banner/banner".$id.".".$extension;

          if($file->move("img/banner", $archive)){

            $bannersSamePos = Banner::where('pos', $inputs['pos'])->get();
            if(count($bannersSamePos) > 0){
              foreach ($bannersSamePos as $bann) {
                $bann->pos = $banner['pos'];
                $bann->save();
              }
            }

            $dataBanner = [
              'titulo' => $inputs['titulo'],
              'imagen' => $archive,
              // 'redirigir' => $inputs['redirigir'],
              'pos' => $inputs['pos']
            ];
            $banner->fill($dataBanner)->save();

            session()->flash('success','Banner actualizado!');
            return Redirect::to('plataforma/banner');

          }else{

            $bannersSamePos = Banner::where('pos', $inputs['pos'])->get();
            if(count($bannersSamePos) > 0){
              foreach ($bannersSamePos as $bann) {
                $bann->pos = $banner['pos'];
                $bann->save();
              }
            }

            $dataBanner = [
              'titulo' => $inputs['titulo'],
              // 'redirigir' => $inputs['redirigir'],
              'pos' => $inputs['pos']
            ];
            $banner->fill($dataBanner)->save();
            session()->flash('notice','Ocurrio un problema al subir la imagen!');
            return Redirect::to('plataforma/banner');
          }

        }else{

          $bannersSamePos = Banner::where('pos', $inputs['pos'])->get();
          if(count($bannersSamePos) > 0){
            foreach ($bannersSamePos as $bann) {
              $bann->pos = $banner['pos'];
              $bann->save();
            }
          }

          $dataBanner = [
            'titulo' => $inputs['titulo'],
            // 'redirigir' => $inputs['redirigir'],
            'pos' => $inputs['pos']
          ];
          $banner->fill($dataBanner)->save();
          session()->flash('success','Banner actualizado!');
          return Redirect::to('plataforma/banner');

        }
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $datos = Banner::findOrFail($id);
      if(strlen($datos['imagen'])>0){
        if(File::exists($datos->imagen) && (File::delete($datos->imagen)) ){
          $datos->delete();
          session()->flash('success','Banner eliminado');
          return Redirect::to('plataforma/banner');
        }else{
          $datos->delete();
          session()->flash('success','Banner eliminado');
          return Redirect::to('plataforma/banner');
        }
      }else{
        $datos->delete();
        session()->flash('success','Banner eliminado');
        return Redirect::to('plataforma/banner');
      }
    }
}
