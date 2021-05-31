<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAntecedentesResponsablePost extends FormRequest
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
            "nombre_del_responsable" => "required",
            "correo_del_responsable" => "required",
            "telefono_fijo_del_responsable" => "required",
            "celular_del_responsable" => "required"
        ];
    }
}
