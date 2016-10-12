<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::resource('/pais','general\pais');
Route::get('/departamentos/{id}','general\estadosController@getEstados');
Route::get('/ciudades/{id}','general\ciudadesController@getCiudades');

Route::group(['middleware' => ['auth', 'roles'],'roles' => ['administrator', 'manager']],
 function () {
	Route::resource('/admin/empresa', 'admin\empresaController');
	Route::resource('/admin/pacientes', 'admin\pacientesController');
	Route::resource('/admin/pacienteslistado', 'admin\pacientesListadoController');
	Route::resource('/admin/segurosmedicos', 'admin\contratacion\seguroMedicoController');
	Route::resource('/admin/segurosmedicoslistado', 'admin\contratacion\seguroMedicoListadoController');
});