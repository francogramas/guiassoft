<?php

namespace guiassoft\Http\Requests\pacientes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;


class updatePaciente extends FormRequest
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
            'documento'=>'required|min:3|unique:pacientes,documento,'.$this->route->getParameter('paciente'),
            'ciudad_id'=>'required|min:2|',
            'tipodocumentopaci_id'=>'required|min:1|',
            'zonaresidencia_id'=>'required|min:1|'
        ];
    }
}
