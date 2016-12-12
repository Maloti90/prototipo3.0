<?php

namespace App\Http\Requests\Perfil;

use App\Http\Requests\Request;

class PerfilUpdateRequest extends Request
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
            'baja'=>'required',
        ];
    }
    public function messages()
    {
      return[
        'baja.required'=>'tienes que seleccionar si lo quieres dar de baja o no.'
      ];
    }
}
