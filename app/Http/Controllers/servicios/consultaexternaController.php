<?php

namespace guiassoft\Http\Controllers\servicios;

use Illuminate\Http\Request;
use Auth;
use guiassoft\Http\Requests;
use guiassoft\Model\empresa;
use guiassoft\User;
use guiassoft\Role;
use guiassoft\Model\empresa\empleados;
use guiassoft\Model\agenda\agenda;
use guiassoft\Model\agenda\agendaestado;

use guiassoft\Http\Controllers\Controller;

class consultaexternaController extends Controller
{
    public function index(){
    	$empresa=empresa::first();
    	$user=User::select('empleados.id','users.name','role.name as role')
    	->join('role','users.role_id','=','role.id')
    	->join('empleados','users.email','=','empleados.correo')
    	->where('users.id',Auth::user()->id)
    	->get();
        $agenda=agenda::where('estado',6)
        ->where('empleados_id',$user[0]{'id'})
        ->first();

    	
    	return view('servicios.consultaexterna.agendaView')
    	->with('empresa',$empresa)
    	->with('user',$user);
    }
}