<?php

namespace guiassoft\Http\Controllers\admin\contratacion;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\http\Requests\contratacion\insertContratosRequest;
use guiassoft\http\Requests\contratacion\updateContratosRequest;


use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\empresa\seguromedico;
use guiassoft\Model\contratacion\tipocontrato;
use guiassoft\Model\contratacion\estadocontrato;
use guiassoft\Model\contratacion\contratos;
use Session;




class contratosController extends Controller
{
    public function index(){
        $seguromedico=seguromedico::pluck('razonsocial','id');    	
    	$contratos=contratos::select('contratos.id','contratos.nombre','contratos.plan','seguromedico.razonsocial as seguromedico','tipocontrato.nombre as tipocontrato','contratos.numero','contratos.inicio','contratos.final','contratos.monto','estadocontrato.nombre as estadocontrato')
    	->join('seguromedico','seguromedico.id','contratos.seguromedico_id')
    	->join('tipocontrato','tipocontrato.id','contratos.tipocontrato_id')
    	->join('estadocontrato','estadocontrato.id','contratos.estadocontrato_id')
    	->get();
    	
    	return view('admin.contratacion.contratos.contratosListadoView')
    	->with('contratos',$contratos)
    	->with('seguromedico',$seguromedico);
    }

    public function create(){
        $seguromedico=seguromedico::pluck('razonsocial','id');
        $tipocontrato=tipocontrato::pluck('nombre','id');
        $estadocontrato=estadocontrato::pluck('nombre','id');
    	return view('admin.contratacion.contratos.contratosAgregarView')
    	->with('seguromedico',$seguromedico)
    	->with('tipocontrato',$tipocontrato)
    	->with('estadocontrato',$estadocontrato);
    }

    public function edit($id){
    	$seguromedico=seguromedico::pluck('razonsocial','id');
        $tipocontrato=tipocontrato::pluck('nombre','id');
        $estadocontrato=estadocontrato::pluck('nombre','id');
        $contratos=contratos::where('id',$id)->first();
    	return view('admin.contratacion.contratos.contratosView')
    	->with('seguromedico',$seguromedico)
    	->with('tipocontrato',$tipocontrato)
    	->with('contratos',$contratos)
    	->with('estadocontrato',$estadocontrato);
    }
    public function show(){

    }

    public function store(insertContratosRequest $request){
    	contratos::create($request->all());
	    Session::flash('save','¡El registro fue ingresado correctamente!');
        return redirect()->route('contratos.create');  

    }

    public function update(updateContratosRequest $request, $id){
    	$contratos=contratos::FindOrFail($id);
    	$input=$request->all();
        $contratos ->fill($input)->save();
        Session::flash('save','El registro fué actualizado correctamente');
        return redirect()->route('contratos.index');                       
    }

    public function destroy($id){

    }
}
