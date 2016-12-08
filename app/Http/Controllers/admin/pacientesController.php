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
use guiassoft\Model\empresa\seguromedico;



class pacientesController extends Controller
{
    public function index(){
        $seguromedico=seguromedico::pluck('razonsocial','id');
    	$pais1 = pais::pluck('name','id')->prepend('Seleccione su pais');
    	$tipousuario = tipousuario::pluck('descripcion','id');
    	$tipodocumentopaci = tipodocumentopaci::pluck('descripcion','id');
    	$zonaresidencia = zonaresidencia::pluck('descripcion','id');
    	$sexo = sexo::pluck('descripcion','id');
    	$texto="Agregar Paciente";

    	return view ('admin/pacientes/pacientesAgregarView')
    	->with('pais1',$pais1)
    	->with('tipousuario',$tipousuario)
    	->with('tipodocumentopaci',$tipodocumentopaci)
    	->with('texto',$texto)
        ->with('seguromedico',$seguromedico)
    	->with('sexo',$sexo)
    	->with('zonaresidencia',$zonaresidencia);
    }

    public function store(insertPaciente $request){
    	pacientes::create($request->all());
	    Session::flash('save','El paciente fue ingresado correctamente');
        return redirect()->route('pacientes.index');               
    }
    
    public function edit($id){

    	$paciente=pacientes::select('tipodocumentopaci_id','tipousuario_id','pacientes.id','pacientes.telefono','pacientes.nacimiento','pacientes.documento','pacientes.nombre1','pacientes.nombre2','pacientes.apellido1','pacientes.apellido2','tipousuario.descripcion as tipousuario','sexo_id','estados.name as departamento','ciudades.name as ciudad','estados.id as estados_id','estados.pais as pais_id','zonaresidencia_id','correo','pacientes.direccion','tipousuario.descripcion as tipousuario','pacientes.seguromedico_id')
    	->join('tipodocumentopaci','tipodocumentopaci.id','=','pacientes.tipodocumentopaci_id')
    	->join('tipousuario','tipousuario.id','=','pacientes.tipousuario_id')
    	->join('zonaresidencia','zonaresidencia.id','=','pacientes.zonaresidencia_id')
        ->join('sexo','sexo.id','=','pacientes.sexo_id')        
    	->join('seguromedico','seguromedico.id','=','pacientes.seguromedico_id')    	
    	->join('ciudades','ciudades.id','=','pacientes.ciudad_id')		
		->join('estados','estados.id','=','ciudades.estados')
		->where('pacientes.id',$id)
		->first();

        $seguromedico=seguromedico::pluck('razonsocial','id');  	
    	$tipousuario = tipousuario::pluck('descripcion','id');
    	$tipodocumentopaci = tipodocumentopaci::pluck('descripcion','id');
    	$zonaresidencia = zonaresidencia::pluck('descripcion','id');
    	$sexo = sexo::pluck('descripcion','id');
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
    	->with('seguromedico',$seguromedico)
    	->with('paciente',$paciente)
    	->with('ciudades',$ciudades)
    	->with('estados',$estados);
    }

    public function update(updatePaciente $request, $id){
    	$pacientes=pacientes::FindOrFail($id);
    	$input=$request->all();
        $pacientes ->fill($input)->save();
        Session::flash('save','El registro fué actualizado correctamente');
        return redirect('admin/pacienteslistado');
    }

    public function autocomplete(Request $request){
        $term = $request->input('term');
        $results = array();
        
        $queries=pacientes::select('tipodocumentopaci.cod','tipousuario_id','pacientes.id','pacientes.nacimiento','pacientes.documento','pacientes.nombre1','pacientes.nombre2','pacientes.apellido1','pacientes.apellido2','tipousuario_id','sexo.descripcion as sexo','pacientes.seguromedico_id')
        ->join('tipodocumentopaci','tipodocumentopaci.id','=','pacientes.tipodocumentopaci_id')        
        ->join('sexo','sexo.id','=','pacientes.sexo_id')        
        ->where('nombre1', 'LIKE', '%'.$term.'%')
        ->orWhere('nombre2', 'LIKE', '%'.$term.'%')
        ->orWhere('apellido1', 'LIKE', '%'.$term.'%')
        ->orWhere('apellido2', 'LIKE', '%'.$term.'%')
        ->orWhere('documento', 'LIKE', '%'.$term.'%')
        ->take(20)->get();
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->cod.' '.$query->documento.' || '.$query->nombre1.' '.$query->nombre2.' '.$query->apellido1.' '.$query->apellido2, 'nacimiento'=>$query->nacimiento, 'seguromedico_id'=>$query->seguromedico_id,'tipousuario_id'=>$query->tipousuario_id, 'sexo'=>$query->sexo];
        }
        return Response()->json($results);        
    }

    public function pacientesCard($id){
        $pacientes=pacientes::where('id',$id)->first();
        return view ('admin/pacientes/pacientesCardView')
        ->with('pacientes',$pacientes);
    }
}