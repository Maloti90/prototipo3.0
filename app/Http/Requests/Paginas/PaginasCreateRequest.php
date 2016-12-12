<?php

namespace App\Http\Requests\Paginas;

use App\Http\Requests\Request;

class PaginasCreateRequest extends Request
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
          'codigo'=>'required|unique:paginas,codigo',
          'descripcion'=>'required|alpha_num',
          'conexion'=>'required|unique:paginas,conexion'
        ];
    }
    public function messages()
    {
      return[
        'codigo.required'=>'El Código es Requerido.',
        'codigo.integer'=>'El Código tiene que ser solo numeros.',
        'codigo.unique'=>'Ese Código ya existe, introduce uno que no exista.',
        'codigo.different'=>'Ese Código ya existe, introduce uno que no exista',
        'descripcion.required'=>'El Descripción es Requerido.',
        'descripcion.alpha_num'=>'En la Descrición solo se aceptan letras y numeros.',
        'conexion.required'=>'La Conexión es Requerida,',
        'conexion.unique'=>'Ya existe, introduce uno que no exista.',
      ];
    }
}
