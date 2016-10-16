<?php

namespace guiassoft\Http\Requests\contratacion;

use Illuminate\Foundation\Http\FormRequest;

class insert_empleados_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
          return [
            'documento'=>'required|min:3|unique:empleados,documento',
            'correo'=>'required|min:3|unique:empleados,correo',
            'ciudad_id'=>'required|min:2|'
        ];
    }
}
