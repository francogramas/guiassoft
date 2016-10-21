<?php

namespace guiassoft\Http\Requests\contratacion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;


class updateContratosRequest extends FormRequest
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
            'numero'=>'required|min:3|unique:contratos,numero,'.$this->route->getParameter('contrato'),
            'inicio'=>'required',
            'final'=>'required'
        ];
    }
}
