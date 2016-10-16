<?php

namespace guiassoft\Http\Requests\contratacion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;


class update_empleados_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     public function __construct(Route $route)
    {
        $this->route=$route;
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'documento'=>'required|min:3|unique:empleados,documento,'.$this->route->getParameter('empleado'),
            'correo'=>'required|min:3|unique:empleados,correo,'.$this->route->getParameter('empleado'),            
            'ciudad_id'=>'required|min:2|'
        ];
    }
}
