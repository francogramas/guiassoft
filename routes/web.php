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

Route::resource('/pais','general\pais');
Route::get('/departamentos/{id}','general\estadosController@getEstados');
Route::get('/ciudades/{id}','general\ciudadesController@getCiudades');
Route::get('/tipoinstalaciones/{id}','admin\instalaciones\instalacionesController@getTipoInstalacion');

Route::group(['middleware' => ['auth', 'roles'],'roles' => ['administrator', 'manager']],
 function () {
	Route::get('/', 'agenda\agendaController@index');
	Route::resource('/admin/empresa', 'admin\empresaController');
	Route::resource('/admin/pacientes', 'admin\pacientesController');
	Route::resource('/admin/pacienteslistado', 'admin\pacientesListadoController');
	Route::resource('/admin/segurosmedicos', 'admin\contratacion\seguroMedicoController');
	Route::resource('/admin/segurosmedicoslistado', 'admin\contratacion\seguroMedicoListadoController');
	Route::resource('/admin/empleados', 'admin\contratacion\empleadosController');
	Route::resource('/admin/empleadoslistado', 'admin\contratacion\empleadoslistadoController');
	Route::resource('/admin/contratos', 'admin\contratacion\contratosController');
	Route::resource('/admin/servicios', 'admin\servicios\asignacionController');
	Route::resource('/admin/instalaciones', 'admin\instalaciones\instalacionesController');
	Route::resource('/hc/antecedente', 'hc\antecedenteController');
	Route::resource('/hc/etapashc', 'hc\etapashcController');
	Route::resource('/agenda/agenda','agenda\agendaController');


	Route::post('/serviciosCrear','admin\servicios\asignacionController@store');
	Route::post('/antecedenteCrear','hc\antecedenteController@store');
	Route::post('/agendaCrear','agenda\agendaController@store');
	Route::post('/especialidadCrear','admin\servicios\asignacionController@storeEspecialidad');
	Route::post('/especialidadEmpleadosCrear','admin\servicios\asignacionController@storeEspecialidadEmpleados');
	Route::post('/cupsespecialidadCrear','admin\servicios\asignacionController@storeCupespecialidad');
	Route::post('/instalacionCrear','admin\instalaciones\instalacionesController@storeInstalacion');
	Route::post('/instalacionEmpleadoCrear','admin\instalaciones\instalacionesController@storeInstalacionEmpleado');
	Route::post('/etapashcCrear','hc\etapashcController@store');

	Route::put('/serviciosactualizar/{id}','admin\servicios\asignacionController@updateServicios');
	Route::put('/especialidadactualizar/{id}','admin\servicios\asignacionController@updateEspecialidad');
	Route::put('/cupsespecialidadactualizar/{id}','admin\servicios\asignacionController@updateCupsespecialidad');
	Route::put('/instalacionactualizar/{id}','admin\instalaciones\instalacionesController@updateInstalacion');
	Route::put('/antecedenteactualizar/{id}','hc\antecedenteController@updateAntecedente');
	Route::put('/cambiarestadoCita/{cita}/{estado}','agenda\agendaController@cambiarEstadoCita');

	Route::get('/cupsespecialidadborrar/{id}','admin\servicios\asignacionController@destroyCupsespecialidad');
	Route::get('/especialidadborrar/{id}','admin\servicios\asignacionController@destroyEspecialidad');
	Route::get('/serviciosborrar/{id}','admin\servicios\asignacionController@destroyServicios');
	Route::post('/instalacionborrar/{id}','admin\instalaciones\instalacionesController@destroyInstalacion');
	Route::post('/antecedenteborrar/{id}','hc\antecedenteController@destroyAntecedente');
	Route::post('/instalacionempleadoborrar/{id}','admin\instalaciones\instalacionesController@destroyInstalacionEmpleado');


	Route::get('/listarantecedentes/{id}', 'hc\antecedenteController@listarAntecentesClase');
	Route::get('/listarespecialidad/{id}','admin\servicios\asignacionController@listarEspecialidad');
	Route::get('/listarservicios/{id}','admin\servicios\asignacionController@listarServicios');
	Route::get('/listarcupsespecialidad/{id}','admin\servicios\asignacionController@listarCupsespecialidad');
	Route::get('/listaragenda/{empleados_id}/{fecha}','agenda\agendaController@listarAgenda');

	Route::get('/listarambitos','admin\servicios\asignacionController@listarAmbitos');

	Route::get('/listarempleados/{id}','admin\instalaciones\instalacionesController@listarEmpleados');
	Route::get('/listarempleadosEspecialidad/{id}','admin\servicios\asignacionController@listarEmpleados');
	Route::get('/listarinstalaciones/{id}','admin\instalaciones\instalacionesController@listarInstalaciones');
	Route::get('/listarinstalacionesempleado/{id}','admin\instalaciones\instalacionesController@listarInstalacionesEmpleados');

	Route::get('/buscar/cups','admin\servicios\asignacionController@autocomplete');
	Route::get('/buscar/pacientes','admin\pacientesController@autocomplete');
	Route::get('/mostrar/pacientes/{id}','admin\pacientesController@pacientesCard');
	Route::get('/mostrar/pacientesCitas/{id}','agenda\agendaController@mostrarListaCitasPacientes');
	Route::get('/mostrarcita/{fecha}/{empleados_id}','agenda\agendaController@mostrarCita');

	Route::get('/listar/especialidad/{id}','admin\servicios\asignacionController@getEspecialidad');
	Route::get('/listar/especialidadempleados/{id}','admin\servicios\asignacionController@getEspecialidadEmpleados');
	Route::get('/listar/cupsespecialidad/{id}','admin\servicios\asignacionController@getCupsespecialidad');
	Route::get('/listar/servicios/{id}','admin\servicios\asignacionController@getServicios');

});