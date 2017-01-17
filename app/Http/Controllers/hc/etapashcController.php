<?php

namespace guiassoft\Http\Controllers\hc;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\model\hc\etapashc;
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
    	$etapashc=etapashc::all();

    	return view('hc.etapasHcView')
    	->with('ambitoprocedimiento',$ambitoprocedimiento)
    	->with('servicios',$servicios)
    	->with('especialidad',$especialidad)
    	->with('etapashc',$etapashc)
    	->with('cupsespecialidad',$cupsespecialidad);
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
}