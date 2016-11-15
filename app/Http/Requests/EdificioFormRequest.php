<?php

namespace ProductoMinimoViable\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EdificioFormRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nombre' => 'requered|max:45',
            'usuario_id' => 'max:10',
            'calle' => 'requered|max:45',
            'numero_calle' => 'requered|max:10',
            'provincia' => 'requered|max:45',
            'localidad' => 'requered|max:45',
            'razon_social' => 'requered|max:45',
            'cuit' => 'requered|max:10',
            'cant_pisos' => 'requered|max:10',
        ];
    }
}
