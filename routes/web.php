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

Route::get('/', function () {
    return view('Plataforma.dashboard.index');
});

Route::resource('Integrantes','IntegrantesControlador');
Route::resource('Servicios','ServiciosControlador');
Route::resource('usua','Usuarios');
Route::resource('banner','BannerCtrl');
Route::get('/usua','Usuarios@index')->name('usua');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/dash', 'dashboardcontrolador@index')->name('dash');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('Plataforma', function (){
return view('Plataforma.dashboard.index');
} )
?>