<?php

namespace App\Http\Requests\Perfil;

use App\Http\Requests\Request;

class PerfilCreateRequest extends Request
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
            'descripcion'=>'required|alpha|unique:perfiles,descripcion|min:6',
        ];
    }
    public function messages()
    {
      return [
        'descripcion.required'=>'La descripción del perfil es obligatoria.',
        'descripcion.alpha'=>'La descripción solo acepta elementos alfabeticos.',
        'descripcion.unique'=>'Esa descripción ya existe, introduzca una diferente.',
        'descripcion.min'=>'La Longitud minima es de 6 caracteres.',
      ];
    }
}
