<?php

namespace guiassoft\Http\Controllers\general;
use Illuminate\Http\Request;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\ciudades;

class ciudadesController extends Controller
{
      public function getCiudades (Request $request, $id)
    {
        if ($request->ajax()){
            $ciudades=ciudades::ciudades($id);
            return response()->json($ciudades);
        }
    }
}
