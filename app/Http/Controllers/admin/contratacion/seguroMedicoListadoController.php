<?php

namespace guiassoft\Http\Controllers\admin\contratacion;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\pais;
use guiassoft\Model\estados;
use guiassoft\Model\ciudades;
use guiassoft\Model\empresa\seguromedico;


class seguroMedicoListadoController extends Controller
{
    function index(){

    	$seguromedico=seguromedico::select('seguromedico.id','nit','razonsocial','tipo','seguromedico.codigo','telefono','direccion','ciudad_id','ciudades.name as ciudad','estados.name as departamento','estados.id as estado_id', 'estados.pais as pais_id')
    	->join('ciudades','ciudades.id','=','seguromedico.ciudad_id')
		->join('estados','estados.id','=','ciudades.estados')->get();        
    	return view('admin.contratacion.segurosmedicos.segurosMedicosListadoView')
    	->with('segurosmedicos',$seguromedico);
    }
    function store(){

    }
    
    function edit($id){

    }

    function update(){

    }
    
}
