<?php

namespace guiassoft\Http\Controllers\hc;

use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;

class etapashcController extends Controller
{
    public function index(){
    	return view('hc.etapasHcView');
    }
}
