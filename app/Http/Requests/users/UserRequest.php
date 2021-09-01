<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->isAdmin()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"      => "required",
            "last_name" => "required",
            'email'     => 'email|required|unique:users,email,' . $this->id, // unique se envia parametros con dos puntos, se envia la tabla, el campo y el id
            "password"  => "required"
        ];
    }

    public function messages()
    {
        return [
            "required"  => "El campo :attribute es requerido",
            "email"     => "El campo :attribute debe ser un correo valido",
            "unique"    => "El campo :attribute ya esta registrado en la base de datos"
        ];
    }

    public function attributes()
    {
        return [
            "name"      => "Nombre",
            "last_name" => "Apellido",
            'email'     => 'Correo Electronico',
            "password"  => "Contraseña"
        ];
    }
}
