<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAntecedentesInstitucionPost extends FormRequest
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
            "nombre_institucion" => "required",
            "rut_institucion" => "required|cl_rut",
            "nombre_del_representante" => "required",
            "telefono_fijo_institucion" => "required",
            "celular_institucion" => "required",
            "email_institucion" => "required",
            "direccion_institucion" => "required",
            "direccion_representante_legal" => "required"
        ];
    }
}
