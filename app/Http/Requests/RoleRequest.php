<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $role_id = $this->route('id');

        return [
            'name' => 'required|max:50|unique:roles,name,' . $role_id . ',id|unique:permissions,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Es obligatorio escribir el nombre del rol',
            'name.max' => 'El rol solo puede tener un máximo de 50 caracteres',
            'name.unique' => 'Ya existe un rol con ese nombre',
            'permissions.name.unique' => 'El nombre ya está en uso en los permisos',
        ];
    }
}
