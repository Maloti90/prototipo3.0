<?php

namespace App\Http\Requests\Usuarios;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class UsuariosUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function __construct(Route $route)
  {
      $this->route= $route;
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
            // 'estado'=>'required',
              'baja'=>'required',
         ];
     }
     public function messages()
     {
       return[
        //  'estado.required'=>'La selección del Estado es obligatoria',
        //  'estado.not_in'=>'Tienes que escojer una de las opciones dadas de Estado.',
        'baja.required'=>'Tienes que seleccionar si quieres dar de Baja a este Usuario',
       ];
     }
}
