<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return '<div style="text-align:center; margin-top: 20%; font-weight: 5; height: 10vh; font-size: 45px; font-family: "Raleway", sans-serif;">Here return landing page <br> <img width="100" height="100" src="https://www.gustore.cl/img/estampados/444/444.png"><div>';
});

Route::group(['middleware' => 'roles:1-2', 'prefix' => 'Plataforma'], function () {

    Route::view('/', 'Plataforma.dashboard.index');
    Route::resource('usua','Usuarios');
    Route::resource('mob','MobiliarioControlador');
    Route::resource('plan','PlantillaControlador');
    Route::resource('pla','PlatillosControlador');
    
});

?>