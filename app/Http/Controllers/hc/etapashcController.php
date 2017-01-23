<?php

namespace guiassoft\Http\Controllers\hc;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\model\hc\etapashc;
use guiassoft\model\hc\etapashcespecialidad;
use guiassoft\model\hc\itemshc;
use guiassoft\Model\servicios\servicios;
use guiassoft\Model\servicios\especialidad;
use guiassoft\Model\servicios\ambitoprocedimiento;
use guiassoft\Model\servicios\cupsespecialidad;
use guiassoft\Model\general\cups;


class etapashcController extends Controller
{
    public function index(){
    	$ambitoprocedimiento=ambitoprocedimiento::all();
    	$servicios=servicios::where('ambitoprocedimiento_id',$ambitoprocedimiento[0]{'id'})->get();
    	$especialidad=especialidad::where('servicios_id',$servicios[0]{'id'})->get();
    	$cupsespecialidad=cupsespecialidad::select('cups.codigo','cups.nombre','cupsespecialidad.id')
    	->join('cups','cupsespecialidad.cups_codigo','=','cups.codigo')
    	->where('cupsespecialidad.especialidad_id',$especialidad[0]{'id'})
    	->get();

         $etapashcespecialidad=etapashcespecialidad::select('etapashc.nombre','etapashcespecialidad.id','etapashcespecialidad.orden')
        ->join('etapashc','etapashcespecialidad.etapashc_id','=','etapashc.id')
        ->where('etapashcespecialidad.cupsespecialidad_id',$cupsespecialidad[0]{'id'})
        ->get();
        $itemshc=itemshc::where('etapashcespecialidad_id',$etapashcespecialidad[0]{'id'})
        ->get();

    	$etapashc=etapashc::all();

    	return view('hc.etapasHcView')
    	->with('ambitoprocedimiento',$ambitoprocedimiento)
    	->with('servicios',$servicios)
    	->with('especialidad',$especialidad)
    	->with('etapashc',$etapashc)
    	->with('cupsespecialidad',$cupsespecialidad)
        ->with('etapashcespecialidad',$etapashcespecialidad)
        ->with('itemshc',$itemshc);
    }
    
    public function store(Request $request){
        if ($request->ajax()){
                $result = etapashc::create($request->all());
            if($result){
                return response()->json(['succes'=>'true']);
            }
            else{
                return response()->json(['succes'=>'false']);
            }
        }
    }

    public function storeetapashcespecialidad(Request $request){
        if ($request->ajax()){
                $result = etapashcespecialidad::create($request->all());
            if($result){
                return response()->json(['succes'=>'true']);
            }
            else{
                return response()->json(['succes'=>'false']);
            }
        }
    }

    public function storeItemshc(Request $request){
        if ($request->ajax()){
                $result = itemshc::create($request->all());
            if($result){
                return response()->json(['succes'=>'true']);
            }
            else{
                return response()->json(['succes'=>'false']);
            }
        }
    }

    public function listarEtapas(){
        $etapashc=etapashc::all();
        return view('hc.listaretapashcView')
        ->with('etapashc',$etapashc);
    }
    public function listarItemshc($id){
        $itemshc=itemshc::where('etapashcespecialidad_id',$id)
        ->get();
        return view('hc.listarItemshcView')
        ->with('itemshc',$itemshc);
    }

     public function listarEtapasEspecaialidad($id){
        $etapashcespecialidad=etapashcespecialidad::select('etapashc.nombre','etapashcespecialidad.id','etapashcespecialidad.orden')
        ->join('etapashc','etapashcespecialidad.etapashc_id','=','etapashc.id')
        ->where('etapashcespecialidad.cupsespecialidad_id',$id)
        ->get();

        return view('hc.listaretapashcespecialidadView')
        ->with('etapashcespecialidad',$etapashcespecialidad);
    }

    public function destroyEtapahc($id){
        $etapashc = etapashc::FindOrFail($id);
        $etapashc->delete();
    }

    public function destroyEtapahcEspecialidad($id){
        $etapashcespecialidad = etapashcespecialidad::FindOrFail($id);
        $etapashcespecialidad->delete();
    }

    public function destroyItemshc($id){
        $itemshc = itemshc::FindOrFail($id);
        $itemshc->delete();
    }

    public function edit($id){
        $etapashc=etapashc::find($id);
        return response()->json($etapashc);
    }

     public function edititemshc($id){
        $itemshc=itemshc::find($id);
        return response()->json($itemshc);
    }

    public function updateEtapasHc(Request $request, $id){
        if ($request->ajax()){      
            $etapashc = etapashc::FindOrFail($id);        
            $input=$request->all();
            $etapashc->fill($input)->save();   
        }
    }
    
    public function updateItemshc(Request $request, $id){
        if ($request->ajax()){      
            $itemshc = itemshc::FindOrFail($id);        
            $input=$request->all();
            $itemshc->fill($input)->save();   
        }
    }

     public function autocomplete( Request $request){
        $term = $request->input('term');
        $results = array();

        $queries = etapashc::select('nombre','id')
            ->where('nombre', 'LIKE', '%'.$term.'%')
            ->take(20)->get();
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nombre ];
        }
        return Response()->json($results);
    }

}