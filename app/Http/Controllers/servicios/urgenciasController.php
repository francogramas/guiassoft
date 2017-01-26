<?php

namespace guiassoft\Http\Controllers\servicios;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;

class urgenciasController extends Controller
{
    public function index(){
    	return view('servicios.urgencias.agendaView');

    }
}
