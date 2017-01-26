<?php

namespace guiassoft\Http\Controllers\admin;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\User;
use Auth;


class direccionadorController extends Controller
{
 public function index(){
 	$rol=User::find(Auth::id());
 	if ($rol{'role_id'}=='8'){
 		return redirect('servicios/consultaexterna');
 	}
 	elseif($rol{'role_id'}=='1'){
 		return redirect('admin/pacientes');
 	}
 	elseif($rol{'role_id'}=='12'){
 		return redirect('agenda/agenda');
 	}
 } 
}
