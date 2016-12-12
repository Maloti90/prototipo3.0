<?php

namespace App\Http\Requests\Paginas;

use App\Http\Requests\Request;

class PaginasUpdateRequest extends Request
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
           'codigo'=>'required|numeric|not_in:id',
           'baja'=>'required',
         ];
     }
     public function messages()
     {
       return[
         'codigo.required'=>'El Código es Requerido.',
         'codigo.numeric'=>'El Código tiene que ser solo numeros.',
         'codigo.not_in'=>'Ese Código ya existe, introduce uno que no exista.',
         'baja.required'=>'Tienes que seleccionar si quieres dar de Baja a esta Página.',
       ];
     }
}
