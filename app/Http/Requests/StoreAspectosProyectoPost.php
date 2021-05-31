<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspectosProyectoPost extends FormRequest
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
            "tipo_de_proyecto" => "required",
            "nombre_del_proyecto" => "required",
            "comuna" => "required",
            "monto_solicitado" => "required",
            "duracion_del_proyecto" => "required",
            "resumen_del_proyecto" => "required|max:1380"
        ];
    }
}
