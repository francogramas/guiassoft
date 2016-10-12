<?php

namespace guiassoft\Http\Controllers\admin\contratacion;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\http\Requests\contratacion\insertSegurosMedicosRequest;
use guiassoft\http\Requests\contratacion\updateSegurosMedicosRequest;

use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\pais;
use guiassoft\Model\estados;
use guiassoft\Model\ciudades;
use guiassoft\Model\empresa\seguromedico;

use Session;

class seguroMedicoController extends Controller
{
    public function index(){
    	$pais1 = pais::pluck('name','id')->prepend('Seleccione su pais');

    	return view('admin.contratacion.segurosMedicos.segurosMedicosAgregarView')
    	->with('pais1',$pais1);    	
    }

    public function store(insertSegurosMedicosRequest $request){
    	seguromedico::create($request->all());
	    Session::flash('save','El seguro fué ingresado correctamente');
        return redirect()->route('segurosmedicos.index');	    
    }

    public function edit($id){
    	$seguromedico=seguromedico::select('seguromedico.id','nit','razonsocial','tipo','telefono','seguromedico.codigo','direccion','ciudad_id','ciudades.name as ciudad','estados.name as departamento','estados.id as estado_id', 'estados.pais as pais_id')
    	->join('ciudades','ciudades.id','=','seguromedico.ciudad_id')
		->join('estados','estados.id','=','ciudades.estados')
        ->where('seguromedico.id',$id)
        ->first();

    	$pais1 = pais::pluck('name','id')->prepend('Seleccione su pais');		
    	$estados=estados::where('pais',$seguromedico{'pais_id'})->pluck('name','id');
    	$ciudades=ciudades::where('estados',$seguromedico{'estado_id'})->pluck('name','id');
    	
    	return view('admin.contratacion.segurosMedicos.segurosMedicosView')
    	->with('segurosmedicos',$seguromedico)
    	->with('pais1',$pais1)
    	->with('estados',$estados)
    	->with('ciudades',$ciudades);
    }

    public function update(updateSegurosMedicosRequest $request,$id){
    	$seguromedico=seguromedico::FindOrFail($id);
    	$input=$request->all();
        $seguromedico->fill($input)->save();
        Session::flash('save','El registro fué actualizado correctamente');
        return redirect('admin/segurosmedicoslistado');
    }
}