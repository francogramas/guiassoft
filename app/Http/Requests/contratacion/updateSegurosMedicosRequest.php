<?php

namespace guiassoft\Http\Requests\contratacion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;


class updateSegurosMedicosRequest extends FormRequest
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
            'codigo'=>'required|min:3|unique:seguromedico,codigo,'.$this->route->getParameter('segurosmedico'),
            'nit'=>'required|min:3|unique:seguromedico,nit,'.$this->route->getParameter('segurosmedico'),            
            'ciudad_id'=>'required|min:2|'
        ];
    }
}
