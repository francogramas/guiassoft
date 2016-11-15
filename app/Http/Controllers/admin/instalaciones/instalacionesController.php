<?php

namespace guiassoft\Http\Controllers\admin\instalaciones;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\instalaciones\inst_servicio;
use guiassoft\Model\instalaciones\inst_tipo;
use guiassoft\Model\instalaciones\instalacion;
use guiassoft\Model\instalaciones\instalacion_empleado;
use guiassoft\Model\general\diasemana;
use guiassoft\Model\empresa\empleados;
use guiassoft\role;


class instalacionesController extends Controller
{
    public function index(){
    	$inst_servicio=inst_servicio::pluck('nombre','id')->prepend('Seleccione el servicio prestado');
    	return view('admin.instalaciones.instalacionesView')
    	->with('inst_servicio',$inst_servicio);
    }

    public function getTipoInstalacion(Request $request, $id){
    	if ($request->ajax()){
            $inst_tipo=inst_tipo::select('id','nombre')->where('inst_servicio_id',$id)->get();
            return response()->json($inst_tipo);
        }
    }

    public function listarInstalaciones(Request $request,$id){
    	if ($request->ajax()){
    		$diasemana=diasemana::all();
    		$instalacion=instalacion::where('inst_tipo_id',$id)->get();
    		$role=role::where('code','>',0)->pluck('name','id');
    		return view('admin.instalaciones.listarInstalacionesView')
        	->with('instalacion',$instalacion)
        	->with('diasemana',$diasemana)
        	->with('role',$role);
        }  
    }

    public function listarEmpleados(Request $request,$id){
        if ($request->ajax()){    		
    		$empleados=empleados::where('role_id',$id)->get();
    		return view('admin.instalaciones.listarEmpleadosView')
        	->with('empleados',$empleados); 
        }
    }

    public function listarInstalacionesEmpleados(Request $request,$id){
        if ($request->ajax()){
            $instalacion_empleado=instalacion_empleado::select('diasemana.descripcion as dia','instalacion_empleado.id','instalacion_empleado.intervalo','empleados.nombre','empleados.apellido1','empleados.apellido2','horai','horaf','instalacion.cupo')
            ->join('instalacion','instalacion_empleado.instalacion_id','=','instalacion.id')
            ->join('empleados','instalacion_empleado.empleados_id','=','empleados.id')
            ->join('diasemana','instalacion_empleado.diasemana_id','diasemana.id')
            ->where('instalacion_id',$id)
            ->get();
            return view('admin.instalaciones.listarInstalacionesEmpleadosView')
            ->with('instalacion_empleado',$instalacion_empleado);
        }
    }

	public function store(Request $request){
    	if ($request->ajax()){
                $result = instalacion::create($request->all());
            if($result){
                return response()->json(['succes'=>'true']);
            }
            else{
                return response()->json(['succes'=>'false']);
            }
        }
    }


    public function storeInstalacion(Request $request){
    	if ($request->ajax()){
                $result = instalacion::create($request->all());
            if($result){
                return response()->json(['succes'=>'true']);
            }
            else{
                return response()->json(['succes'=>'false']);
            }
        }
    }

     public function storeInstalacionEmpleado(Request $request){
        if ($request->ajax()){
                $result = instalacion_empleado::create($request->all());
            if($result){
                return response()->json(['succes'=>'true']);
            }
            else{
                return response()->json(['succes'=>'false']);
            }
        }
    }

    public function destroyInstalacion(Request $request, $id){
    	if ($request->ajax()){
        	$instalacion = instalacion::FindOrFail($id);
        	$instalacion->delete();            
        }
    }

    public function destroyInstalacionEmpleado(Request $request, $id){
        if ($request->ajax()){
            $instalacion_empleado = instalacion_empleado::FindOrFail($id);
            $instalacion_empleado->delete();            
        }
    }

    public function edit($id){
    	$instalacion=instalacion::find($id);
    	return response()->json($instalacion);
    }

    public function updateInstalacion(Request $request, $id){
        if ($request->ajax()){     	
        	$instalacion = instalacion::FindOrFail($id); 		
            $input=$request->all();
            $instalacion->fill($input)->save();   
        }
    }
}
