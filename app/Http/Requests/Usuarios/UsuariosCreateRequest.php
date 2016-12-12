<?php

namespace App\Http\Requests\Usuarios;

use App\Http\Requests\Request;

class UsuariosCreateRequest extends Request
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
            'nombre'=>'required|min:3|max:50|alpha_dash',
            // 'apellidos'=>'required|min:3|max:50|alpha_dash',
            'idPerfil'=>'required|not_in:0',
            'idEstado'=>'required|not_in:0',
            'clave'=>'required|min:6|max:15|alpha_dash|confirmed',
            // 'clave_confirmation'=>'required|min:6|max:15|alpha_dash'
        ];
    }
    public function messages()
    {
      return[
        'nombre.required'=>'El campo Nombre es obligatorio.',
        'nombre.min'=>'El Campo Nombre tiene que tiene que tener minimo 3 caracteres.',
        'nombre.alpha_dash'=>'El solo puede contener letras los espacions con guión bajo _',
        // 'apellidos.required'=>'El campo Apellidos es obligatorio.',
        // 'apellidos.min'=>'El Campo Apellidos tiene que tiene que tener minimo 3 caracteres.',
        // 'apellidos.alpha_dash'=>'El solo puede contener letras los espacions con guión bajo _',
        'idPerfil.required'=>'La selección del Perfil es obligatoria',
        'idPerfil.not_in'=>'Tienes que escojer una de las opciones dadas de Perfil.',
        'idEstado.required'=>'La selección del Estado es obligatoria',
        'idEstado.not_in'=>'Tienes que escojer una de las opciones dadas de Estado.',
        'clave.required'=>'La Contraseña es obligatoria',
        'clave.min'=>'La Contraseña tiene que tener como minimo 6 caracteres',
        'clave.alpha_dash'=>'La Contraseña solo puede conterner letras, numeros y guiones',
        'clave.max'=>'El maximo de longitud de la Contraseña son 15 caracteres',
        'clave.confirmed'=>'Tienen que coincidir las Contraseñas',
      ];
    }
}
