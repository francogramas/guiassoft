<?php

namespace guiassoft\Http\Controllers\general;
use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\estados;

class estadosController extends Controller
{
    public function getEstados(Request $request, $id)
    {
        if ($request->ajax()){
            $estados=estados::estados($id);
            return response()->json($estados);
        }
    }
}
