<?php

namespace guiassoft\Http\Requests\pacientes;
use Illuminate\Foundation\Http\FormRequest;

class insertPaciente extends FormRequest
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
            'documento'=>'required|min:3|unique:pacientes,documento',
            'ciudad_id'=>'required|min:2|',
            'tipodocumentopaci_id'=>'required|min:1|',
            'zonaresidencia_id'=>'required|min:1|'
        ];
    }

     public function messages()  
    {
        return [
        'documento.not_in'=>'El campo documento es obloigatorio',
        'documento.unique'=>'El documento ya se encuentra registrado',        
        'ciudad_id.min:2'=>'El campo ciudad es obloigatorio',
        'tipodocumentopaci_id.min:1'=>'El campo tipo de documento es obloigatorio',        
        'zonaresidencia_id.min:1'=>'El campo zona de residencia es obloigatorio',
        'ciudad_id.min:1'=>'El campo ciudad es obloigatorio'];
    }
}
