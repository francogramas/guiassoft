<?php

namespace guiassoft\Http\Controllers\admin\contratacion;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;

use guiassoft\Model\pacientes\tipodocumentopaci;
use guiassoft\Model\contratacion\estadoempleados;
use guiassoft\Model\empresa\empleados;
use guiassoft\Model\general\sexo;
use guiassoft\Model\pais;
use guiassoft\Model\estados;
use guiassoft\Model\ciudades;

use Session;



class empleadosListadoController extends Controller
{
	public function index(){
		$empleados=empleados::select('tipodocumentopaci_id','tipodocumentopaci.cod as tipocod','empleados.id','empleados.telefono','empleados.nacimiento','empleados.documento','empleados.nombre','empleados.apellido1','empleados.apellido2','sexo.cod as sexo','estados.name as departamento','ciudades.name as ciudad','estados.id as estados_id','estados.pais as pais_id','correo','empleados.direccion','estadoempleados.nombre as estadoEmp','role.name as role')
    	->join('tipodocumentopaci','tipodocumentopaci.id','=','empleados.tipodocumentopaci_id')    	
        ->join('role','role.id','=','empleados.role_id')        
        ->join('sexo','sexo.id','=','empleados.sexo_id')        
    	->join('estadoempleados','estadoempleados.id','=','empleados.estadoempleados_id')		
    	->join('ciudades','ciudades.id','=','empleados.ciudad_id')		
		->join('estados','estados.id','=','ciudades.estados')
		->get();
    return view('admin.contratacion.empleados.empleadosListadoView')
    ->with('empleados',$empleados);
	}	
}
