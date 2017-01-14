<?php

namespace guiassoft\Http\Controllers\hc;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\hc\antecedente;
use guiassoft\Model\hc\antecedenteclase;

class antecedenteController extends Controller
{
    public function index(){
    	$clases=antecedenteclase::all();
    	$antecedentes=antecedente::where('antecedenteclase_id',$clases[0]{"id"})->get();

    	return view('hc.antecedentesDesingView')
    	->with('clases',$clases)
    	->with('antecedentes',$antecedentes);
    }

    public function listarAntecentesClase(Request $request, $clase){
    	if ($request->ajax()){
	    	$clases=antecedenteclase::select('id','nombre')->where('id',$clase)->first();    	
			$antecedentes=antecedente::where('antecedenteclase_id',$clase)->get();
			return view('hc.antecedentesClase')
			->with('antecedentes',$antecedentes)
			->with('clase',$clases);
		}
	}

	 public function destroyAntecedente(Request $request, $id){
    	if ($request->ajax()){
        	$antecedente = antecedente::FindOrFail($id);
        	$antecedente->delete();            
        }
    }

    public function store(Request $request){
        if ($request->ajax()){
            antecedente::create($request->all());
        }
    }
    public function edit(Request $request, $id){
        if ($request->ajax()){
            $antecedente=antecedente::find($id);
            return response()->json($antecedente);
        }
    }
    public function show($id){
         $antecedente=antecedente::find($id);
            return response()->json($antecedente);
    }
    public function updateAntecedente(Request $request, $id){
        if ($request->ajax()){
            $antecedente = antecedente::FindOrFail($id);        
            $input=$request->all();
            $antecedente->fill($input)->save();  
        }
    }
}