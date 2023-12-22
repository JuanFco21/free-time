<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use App\Enums\Status;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class AdministratorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $administrator_id = $this->route('id');

        $rules = [
            'name' => 'required|unique:administrators,name,' . $administrator_id,
            'last_name' => 'required|unique:administrators,last_name,' . $administrator_id ,
            'email' => 'required|unique:administrators,email,' . $administrator_id . '|email|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:500',
            'gender' => ['required', new Enum(Gender::class)],
            'role' => 'required',
            'status' => ['required', new Enum(Status::class)],
        ];

        if ($this->isMethod('POST')) {
            $rules['password'] = 'required|min:6|confirmed';
        }

        if ($this->isMethod('PUT')) {
            $rules['new_password'] = 'nullable|min:6|confirmed';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.unique' => 'Ya existe un administrador con ese nombre.',
            'last_name.required' => 'El campo apellido es obligatorio.',
            'last_name.unique' => 'Ya existe un administrador con ese apellido.',
            'email.required' => 'El campo email es obligatorio.',
            'email.unique' => 'Ya existe un administrador con ese email.',
            'email.email' => 'Por favor, introduce un email válido.',
            'email.max' => 'No puede haber un email con mas de 255 caracteres.',
            'image.mimes' => 'El formato de la imagen debe ser jpeg, png o jpg.',
            'image.image' => 'El archivo seleccionado debe ser una imagen.',
            'image.max' => 'La imagen no debe superar los 500KB.',
            'gender.required' => 'Por favor, selecciona un género.',
            'role.required' => 'Por favor, asigna un rol al administrador.',
            'status.required' => 'Por favor, selecciona un estado para el administrador.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'new_password.confirmed' => 'Las nuevas contraseñas no coinciden.',
            'new_password.min' => 'La nueva contraseña debe tener al menos 6 caracteres.',
        ];
    }
}
