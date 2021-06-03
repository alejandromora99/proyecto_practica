<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDesarrolloProyectoPost extends FormRequest
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
            "objetivo_general" => "required",
            "objetivos_especificos" => "required",
            "territorio" => "required",
            "caracteristicas_poblacion" => "required",
            "beneficiario_directo_hombre" => "required",
            "beneficiario_directo_mujer" => "required",
            "beneficiario_directo_total" => "required",

            "beneficiario_indirecto_hombre" => "required",
            "beneficiario_indirecto_mujer" => "required",
            "beneficiario_indirecto_total" => "required",
            "content" => "required",
            "resultados_esperados" => "required",
            "cronograma" => "required",
            "detalles_actividades" => "required",
            
            "recursos_humanos" => "required",
            "gastos_en_equipamiento" => "required",
            "gastos_generales" => "required",
            "gastos_en_difusion" => "required",
            "total_presupuesto" => "required",

            "detalle_recurso_humano" => "required"


        ];
    }
}
