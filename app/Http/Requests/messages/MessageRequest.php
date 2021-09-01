<?php

namespace App\Http\Requests\messages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MessageRequest extends FormRequest
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
        if (Auth::check()) {
            return [
                'subject'   => 'required',
                'content'   => 'required',
            ];
        }
        return [
            'name'      => 'required',
            'last_name' => 'required',
            'email'     => 'required|email',
            'subject'   => 'required',
            'content'   => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombres',
            'last_name' => 'Apellidos',
            'email' => 'Correo',
            'subject' => 'Asunto',
            'content' => 'Mensaje',
        ];
    }
}
