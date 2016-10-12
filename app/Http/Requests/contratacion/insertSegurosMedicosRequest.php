<?php

namespace guiassoft\Http\Requests\contratacion;

use Illuminate\Foundation\Http\FormRequest;

class insertSegurosMedicosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'nit'=>'required|min:3|unique:seguromedico,nit',
            'codigo'=>'required|min:3|unique:seguromedico,codigo',
            'ciudad_id'=>'required|min:2|'
        ];
    }
}
