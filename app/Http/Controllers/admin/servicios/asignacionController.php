<?php

namespace guiassoft\Http\Controllers\admin\servicios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\servicios\ambitoprocedimiento;
use guiassoft\Model\servicios\servicios;
use guiassoft\Model\servicios\especialidad;
use guiassoft\Model\servicios\especialidadempleados;
use guiassoft\Model\servicios\cupsespecialidad;
use guiassoft\Model\general\cups;
use guiassoft\Model\empresa\empleados;



class asignacionController extends Controller
{
    public function index(){
        $ambitoprocedimiento_id=0;
    	$ambitoprocedimiento=ambitoprocedimiento::all();
        $servicios=servicios::where('ambitoprocedimiento_id','0')->get();        
    	return view('admin.servicios.asignacionView')
        ->with('ambitoprocedimiento',$ambitoprocedimiento)
    	->with('ambitoprocedimiento_id',$ambitoprocedimiento_id)
        ->with('servicios',$servicios)
        ->with('servicio','')
        ->with('especialidad','')
        ->with('ambito','');

    }
    
    public function store(Request $request){
        if ($request->ajax()){
                $result = servicios::create($request->all());
            if($result){
                return response()->json(['succes'=>'true']);
            }
            else{
                return response()->json(['succes'=>'false']);
            }
        }        
    }

    public function storeEspecialidad(Request $request){
        if ($request->ajax()){
            $result = especialidad::create($request->all());
            if($result){
                return response()->json(['succes'=>'true']);
            }
            else{
                return response()->json(['succes'=>'false']);
            }
        }        
    }

    public function storeEspecialidadEmpleados(Request $request){
        if ($request->ajax()){
            $result=especialidadempleados::create($request->all());
        }        
    }

    public function storeCupespecialidad(Request $request){
        if ($request->ajax()){
                $result = cupsespecialidad::create($request->all());
            if($result){
                return response()->json(['succes'=>'true']);
            }
            else{
                return response()->json(['succes'=>'false']);
            }
        }        
    }

    public function listarEspecialidad($id){
        $especialidad=especialidad::where('servicios_id',$id)->get();
        return view('admin.servicios.especialidadView')
        ->with('especialidad',$especialidad);

    }

    public function listarServicios($id){
        $servicios=servicios::where('ambitoprocedimiento_id',$id)->get();
        return view('admin.servicios.serviciosView')
        ->with('servicios',$servicios);
    }

    public function listarEmpleados($id){
        $empleados=DB::select('select * from empleados where id not in(select empleados_id from especialidadempleados where especialidad_id = ?)', [$id]);
        return view('admin.servicios.empleadosView')
        ->with('empleados',$empleados);
    }

    public function getEspecialidad (Request $request, $id)
    {
        if ($request->ajax()){
            $especialidad=especialidad::select('id','nombre')->where('servicios_id',$id)->get();            
            return response()->json($especialidad);
        }
    }

    public function getEspecialidadEmpleados (Request $request, $id)
    {
        if ($request->ajax()){
            $empleados=empleados::select('empleados.id','empleados.nombre','empleados.apellido1','empleados.apellido2')
            ->join('especialidadempleados','especialidadempleados.empleados_id','=','empleados.id')
            ->where('especialidadempleados.especialidad_id',$id)
            ->get();
            return response()->json($empleados);
        }
    }

    public function listarAmbitos(){
        $ambitoprocedimiento=ambitoprocedimiento::all();
        return view('admin.servicios.ambitoView')
        ->with('ambitoprocedimiento',$ambitoprocedimiento);
    }

    public function listarCupsespecialidad($id){
        $cupsespecialidad=cupsespecialidad::select('cupsespecialidad.id','cups.codigo','cups.nombre')
        ->join('cups','cupsespecialidad.cups_codigo','cups.codigo')
        ->where('cupsespecialidad.especialidad_id',$id)->get();
        return view('admin.servicios.cupsespecialidadView')
        ->with('cupsespecialidad',$cupsespecialidad);
    }
    
    public function destroyServicios($id){        
        $servicios = servicios::FindOrFail($id);
        $servicios->delete();
    }

    public function destroyEspecialidad($id){
        $especialidad = especialidad::FindOrFail($id);
        $especialidad->delete();        
    }

     public function destroyCupsespecialidad($id){
        $cupsespecialidad = cupsespecialidad::FindOrFail($id);
        $cupsespecialidad->delete();        
    }
    
    public function update(Request $request, $id){
        if ($request->ajax()){ 
            $servicios=servicios::FindOrFail($id);
            $input=$request->all();
            $servicios ->fill($input)->save();        
        }
    }

     public function updateServicios(Request $request, $id){
        if ($request->ajax()){ 
            $servicios=servicios::FindOrFail($id);
            $input=$request->all();
            $servicios ->fill($input)->save();        
        }
    }

    public function updateEspecialidad(Request $request, $id){
        if ($request->ajax()){
            $especialidad=especialidad::FindOrFail($id);
            $input=$request->all();
            $especialidad ->fill($input)->save();
        }
    }

    public function updateCupsespecialidad(Request $request, $id){
        if ($request->ajax()){
            $cupsespecialidad=cupsespecialidad::FindOrFail($id);
            $input=$request->all();
            $cupsespecialidad ->fill($input)->save();        
        }
    }
    
    public function edit($id){
        $servicios=servicios::where('id',$id)->first();
        return view('admin.servicios.serviciosEditView')->with('servicios',$servicios);
    }

     public function autocomplete( Request $request){
        $term = $request->input('term');
        $results = array();

        $queries = cups::select('nombre','codigo')
            ->where('nombre', 'LIKE', '%'.$term.'%')
            ->orWhere('codigo', 'LIKE', '%'.$term.'%')
            ->take(20)->get();
        foreach ($queries as $query)
        {
            $results[] = [ 'codigo' => $query->codigo, 'value' => $query->codigo.' || '.$query->nombre ];
        }
        return Response()->json($results);
    }

}