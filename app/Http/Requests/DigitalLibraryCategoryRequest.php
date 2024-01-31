<?php

namespace App\Http\Requests;

use App\Enums\Status;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class DigitalLibraryCategoryRequest extends FormRequest
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
        $digital_library_category_id = $this->route('id');

        return [
            'name' => 'required|unique:digital_library_categories,name,' . $digital_library_category_id,
            'status' => ['required', new Enum(Status::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.unique' => 'Ya existe una biblioteca digital con ese nombre.',
            'status.required' => 'Por favor, selecciona un estado para la biblioteca digital.',
        ];
    }
}
