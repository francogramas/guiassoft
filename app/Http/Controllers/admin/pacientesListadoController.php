<?php

namespace guiassoft\Http\Controllers\admin;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\pais;
use guiassoft\Model\pacientes\tipodocumentopaci;
use guiassoft\Model\pacientes\pacientes;
use guiassoft\Model\pacientes\tipousuario;
use guiassoft\Model\pacientes\zonaresidencia;
use guiassoft\Model\general\sexo;

class pacientesListadoController extends Controller
{
    public function index(){
    	$pacientes=pacientes::select('tipodocumentopaci.cod as tipodocumento','pacientes.id','pacientes.telefono','pacientes.nacimiento','pacientes.documento','pacientes.nombre1','pacientes.nombre2','pacientes.apellido1','pacientes.apellido2','tipousuario.descripcion as tipousuario','sexo.cod as sexo','estados.name as departamento','ciudades.name as ciudad', 'seguromedico.razonsocial as seguromedico')
    	->join('tipodocumentopaci','tipodocumentopaci.id','=','pacientes.tipodocumentopaci_id')
    	->join('tipousuario','tipousuario.id','=','pacientes.tipousuario_id')
    	->join('zonaresidencia','zonaresidencia.id','=','pacientes.zonaresidencia_id')
        ->join('sexo','sexo.id','=','pacientes.sexo_id')
    	->join('seguromedico','seguromedico.id','=','pacientes.seguromedico_id')
    	->join('ciudades','ciudades.id','=','pacientes.ciudad_id')		
		->join('estados','estados.id','=','ciudades.estados')
		->join('pais','pais.id','=','estados.pais')->get();
    	return view('admin/pacientes/pacientesListadoView')
    	->with('pacientes',$pacientes);
    }
    public function store(){

    }

    public function edit(Request $request){

    }
}
