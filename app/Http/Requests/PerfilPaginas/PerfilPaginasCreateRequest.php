<?php

namespace App\Http\Requests\PerfilPaginas;

use App\Http\Requests\Request;

class PerfilPaginasCreateRequest extends Request
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
            'idPerfil'=>'required|not_in:0',
            'idPagina'=>'required|not_in:0',
            'idTipoAcceso'=>'required|not_in:0',
            'descripcion'=>'required|unique:perfil_paginas, "Descripcion"',
        ];
    }
    public function messages()
    {
      return[
      'idPerfil.required'=>'Tienes que seleccionar un perfil.',
      'idPerfil.not_in'=>'Tienes que escojer una de las opciones dadas de Perfil.',
      'idPagina.required'=>'Tienes que seleccionar un pagina.',
      'idPagina.not_in'=>'Tienes que escojer una de las opciones dadas de Paginas.',
      'idTipoAcceso.required'=>'Tienes que seleccionar un tipo de acceso.',
      'idTipoAcceso.not_in'=>'Tienes que escojer una de las opciones dadas de Tipo de Acceso.',
      'descripcion.required'=>'Tienes que escribir una Descripción obligatoria.',
      'descripcion.alpha'=>'Solo se permiten caracteres Alfabeticos.',
      'descripcion.unique'=>'No puede haber dos descripciones iguales.'
    ];
    }
}
