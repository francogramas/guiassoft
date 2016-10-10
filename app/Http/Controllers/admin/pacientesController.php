<?php

namespace guiassoft\Http\Controllers\admin;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\http\Requests\pacientes\insertPaciente;
use guiassoft\http\Requests\pacientes\updatePaciente;

use Session;

use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\pais;
use guiassoft\Model\estados;
use guiassoft\Model\ciudades;
use guiassoft\Model\pacientes\tipodocumentopaci;
use guiassoft\Model\pacientes\pacientes;
use guiassoft\Model\pacientes\tipousuario;
use guiassoft\Model\pacientes\zonaresidencia;
use guiassoft\Model\general\sexo;


class pacientesController extends Controller
{
    public function index(){
    	$pais1 = pais::pluck('name','id')->prepend('Seleccione su pais');
    	$tipousuario = tipousuario::pluck('descripcion','id')->prepend('Seleccione el tipo de usuario');
    	$tipodocumentopaci = tipodocumentopaci::pluck('descripcion','id')->prepend('Seleccione el tipo de documento');
    	$zonaresidencia = zonaresidencia::pluck('descripcion','id')->prepend('Seleccione la zona de residencia');
    	$sexo = sexo::pluck('descripcion','id')->prepend('Seleccione el sexo');
    	$texto="Agregar Paciente";

    	return view ('admin/pacientes/pacientesAgregarView')
    	->with('pais1',$pais1)
    	->with('tipousuario',$tipousuario)
    	->with('tipodocumentopaci',$tipodocumentopaci)
    	->with('texto',$texto)
    	->with('sexo',$sexo)
    	->with('zonaresidencia',$zonaresidencia);
    }

    public function store(insertPaciente $request){
    	pacientes::create($request->all());
	    Session::flash('save','El paciente fue ingresado correctamente');
    }
    public function edit($id){

    	$paciente=pacientes::select('tipodocumentopaci_id','tipousuario_id','pacientes.id','pacientes.telefono','pacientes.nacimiento','pacientes.documento','pacientes.nombre1','pacientes.nombre2','pacientes.apellido1','pacientes.apellido2','tipousuario.descripcion as tipousuario','sexo_id','estados.name as departamento','ciudades.name as ciudad','estados.id as estados_id','estados.pais as pais_id','zonaresidencia_id','correo','direccion')
    	->join('tipodocumentopaci','tipodocumentopaci.id','=','pacientes.tipodocumentopaci_id')
    	->join('tipousuario','tipousuario.id','=','pacientes.tipousuario_id')
    	->join('zonaresidencia','zonaresidencia.id','=','pacientes.zonaresidencia_id')
    	->join('sexo','sexo.id','=','pacientes.sexo_id')    	
    	->join('ciudades','ciudades.id','=','pacientes.ciudad_id')		
		->join('estados','estados.id','=','ciudades.estados')
		->where('pacientes.id',$id)
		->first();    	

    	
    	$tipousuario = tipousuario::pluck('descripcion','id')->prepend('Seleccione el tipo de usuario');
    	$tipodocumentopaci = tipodocumentopaci::pluck('descripcion','id')->prepend('Seleccione el tipo de documento');
    	$zonaresidencia = zonaresidencia::pluck('descripcion','id')->prepend('Seleccione la zona de residencia');
    	$sexo = sexo::pluck('descripcion','id')->prepend('Seleccione el sexo');
    	$pais1 = pais::pluck('name','id')->prepend('Seleccione su pais');
	
		$estados=estados::where('pais',$paciente{'pais_id'})->pluck('name','id');
    	$ciudades=ciudades::where('estados',$paciente{'estados_id'})->pluck('name','id');
    	
    	$texto="Actualizar Paciente";

		return view ('admin/pacientes/pacientesView')
    	->with('pais1',$pais1)
    	->with('tipousuario',$tipousuario)
    	->with('tipodocumentopaci',$tipodocumentopaci)
    	->with('texto',$texto)
    	->with('sexo',$sexo)
    	->with('zonaresidencia',$zonaresidencia)
    	->with('paciente',$paciente)
    	->with('ciudades',$ciudades)
    	->with('estados',$estados);
    }

    public function update(Request $request, $id){
    	$pacientes=pacientes::FindOrFail($id);
    	$input=$request->all();
        $pacientes ->fill($input)->save();
        Session::flash('update','El registro fué actualizado correctamente');
        return redirect('admin/pacienteslistado');        
    }
}