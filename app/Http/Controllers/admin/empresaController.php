<?php

namespace guiassoft\Http\Controllers\admin;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\pais;
use guiassoft\Model\empresa;
use guiassoft\Model\tipoDocumento;
use guiassoft\Model\estados;
use guiassoft\Model\ciudades;
use Session;

class empresaController extends Controller
{
    function index(){    	
    	$empresa1=empresa::select('empresa.id','empresa.tipodocumento_id','empresa.documento','nombre','direccion','codigo_habilitacion','telefono','correo','ciudad_id','estados.id as estado','pais.id as pais')
		->join('ciudades','ciudades.id','=','empresa.ciudad_id')
		->join('estados','estados.id','=','ciudades.estados')
		->join('pais','pais.id','=','estados.pais')
		->first();

    	$pais1 = pais::pluck('name','id')->prepend('Seleccione su pais');
		$estados1=estados::where('pais',$empresa1{'pais'})->pluck('name','id');
    	$ciudades1=ciudades::where('estados',$empresa1{'estado'})->pluck('name','id');		

    	$tipodocumento = tipoDocumento::pluck('description','id')->prepend('Seleccione el tipo de documento');
    	$count=empresa::count();

    	if ($count==0){
    		$texto='Agregar';
    		return view('admin.empresaAgregarView')
	    	->with('texto',$texto)
	    	->with('empresa1',$empresa1)
	    	->with('pais1',$pais1)
	    	->with('tipodocumento',$tipodocumento);
    	} 
    	else{
    		$texto='Actualizar';
    		return view('admin.empresaView')
	    	->with('texto',$texto)
	    	->with('empresa1',$empresa1)
	    	->with('pais1',$pais1)
	    	->with('estados1',$estados1)
	    	->with('ciudades1',$ciudades1)	    	
	    	->with('tipodocumento',$tipodocumento);	
    	}

    	// return ($empresa1);
    }

    function store(Request $request){
    	$count=empresa::count();
    	$empresa=empresa::first();
    	if ($count==0){
			empresa::create($request->all());
	        Session::flash('insert','El registro fue ingresado');
		}
		else{

			$empresa=empresa::FindOrFail($empresa{'id'});				
			$request->request->add(['id' => $empresa{'id'}]);
			$input=$request->all();
    	    $empresa ->fill($input)->save();
	        Session::flash('update','El registro fue actualizado correctamente');
		}
        return redirect()->route('empresa.index');
    }
}
