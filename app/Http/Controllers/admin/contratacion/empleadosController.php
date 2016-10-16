<?php

namespace guiassoft\Http\Controllers\admin\contratacion;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\http\Requests\contratacion\insert_empleados_request;
use guiassoft\http\Requests\contratacion\update_empleados_request;


use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\pacientes\tipodocumentopaci;
use guiassoft\Model\contratacion\estadoempleados;
use guiassoft\Model\general\sexo;
use guiassoft\Model\empresa\empleados;
use guiassoft\Role;
use guiassoft\Model\estados;
use guiassoft\Model\ciudades;

use Session;
use guiassoft\Model\pais;



class empleadosController extends Controller
{
    public function index(){
    	$role=role::pluck('name','id');
    	$tipodocumentopaci = tipodocumentopaci::pluck('descripcion','id');   
    	$estadoempleados = estadoempleados::pluck('nombre','id');   
    	$pais1 = pais::pluck('name','id')->prepend('Seleccione el pais');    	
    	$sexo = sexo::pluck('descripcion','id');

    	return view('admin.contratacion.empleados.empleadosAgregarView')
    	->with('tipodocumentopaci',$tipodocumentopaci)
    	->with('estadoempleados',$estadoempleados)
    	->with('sexo',$sexo)
    	->with('role',$role)
    	->with('pais1',$pais1);
    }

    public function store(Request $request){
    	empleados::create($request->all());
	    Session::flash('save','El empleado fué ingresado correctamente');
        return redirect()->route('empleados.index');
    }

    public function edit($id){
    	$role=role::pluck('name','id');
    	$tipodocumentopaci = tipodocumentopaci::pluck('descripcion','id');   
    	$estadoempleados = estadoempleados::pluck('nombre','id');   
    	$pais1 = pais::pluck('name','id')->prepend('Seleccione el pais');    	
    	$sexo = sexo::pluck('descripcion','id');


    	$empleados=empleados::select('tipodocumentopaci_id','tipodocumentopaci.cod as tipocod','empleados.id','empleados.telefono','empleados.nacimiento','empleados.documento','empleados.nombre','empleados.apellido1','empleados.apellido2','sexo_id','sexo.cod as sexo','estados.name as departamento','ciudades.name as ciudad','estados.id as estados_id','role_id','estados.pais as pais_id','correo','estadoempleados_id','estados.id as estados_id','empleados.direccion','estadoempleados.nombre as estadoEmp')
    	->join('tipodocumentopaci','tipodocumentopaci.id','=','empleados.tipodocumentopaci_id')    	
        ->join('sexo','sexo.id','=','empleados.sexo_id')
    	->join('estadoempleados','estadoempleados.id','=','empleados.estadoempleados_id')		
    	->join('ciudades','ciudades.id','=','empleados.ciudad_id')		
		->join('estados','estados.id','=','ciudades.estados')
		->where('empleados.id',$id)
		->first();
    	     
        $estados=estados::where('pais',$empleados{'pais_id'})->pluck('name','id');
        $ciudades=ciudades::where('estados',$empleados{'estados_id'})->pluck('name','id');


    	return view('admin.contratacion.empleados.empleadosView')
    	->with('tipodocumentopaci',$tipodocumentopaci)
    	->with('estadoempleados',$estadoempleados)
        ->with('sexo',$sexo)
        ->with('estados',$estados)
        ->with('ciudades',$ciudades)
    	->with('empleados',$empleados)
    	->with('role',$role)
    	->with('pais1',$pais1);
    }

    public function update(update_empleados_request $request, $id){
        $empleados=empleados::FindOrFail($id);
        $input=$request->all();
        $empleados ->fill($input)->save();
        Session::flash('save','El registro fué actualizado correctamente');
        return redirect('admin/empleadoslistado');
    }
}