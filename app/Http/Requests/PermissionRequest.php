<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        $permission_id = $this->route('id');

        return [
            'name' => 'required|unique:permissions,name,' . $permission_id,
            'group_name' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Es obligatorio escribir el nombre del permiso',
            'name.unique' => 'Ya existe un permiso con ese nombre',
            'group_name.required' => 'Es obligatorio asignar el grupo del permiso',
        ];
    }
}
