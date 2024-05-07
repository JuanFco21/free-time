<?php

namespace App\Http\Requests;

use App\Enums\PublicationStatus;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class DigitalLibraryRequest extends FormRequest
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
        $digitalLibrary = $this->route('id');

        return [
            'title' => 'required|unique:digital_libraries,title,' . $digitalLibrary,
            'content' => 'required',
            'tags' => 'required',
            'authors.*' => 'required|min:1',
            'publication_date' => 'required|date',
            'article_year' => 'required|integer',
            'article_volume' => 'required|integer',
            'article_number' => 'required',
            'article_number_pages' => 'required|integer',
            'isnn' => 'required',
            'category' => 'required',
            'people_opinion' => 'nullable',
            'status' => ['required', new Enum(PublicationStatus::class)],
        ];

        if ($this->isMethod('POST')) {
            $rules['article_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $rules['article_file'] = 'required|file|mimes:pdf,doc,docx|max:20048';
        }

        if ($this->isMethod('PUT')) {
            $rules['article_image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $rules['article_file'] = 'nullable|file|mimes:pdf,doc,docx|max:20048';
        }
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.unique' => 'Ya existe un artículo con ese título.',
            'content.required' => 'El campo contenido es obligatorio.',
            'tags.required' => 'Debes de asignar al menos una etiqueta.',
            'article_image.required' => 'Debes subir una imagen.',
            'article_image.image' => 'El archivo debe ser una imagen.',
            'article_image.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif o svg.',
            'article_image.max' => 'El tamaño máximo del archivo es de 2 MB.',
            'article_file.required' => 'Debes subir un archivo.',
            'article_file.file' => 'El archivo debe ser un documento.',
            'article_file.mimes' => 'El archivo debe ser de tipo: pdf, doc o docx.',
            'article_file.max' => 'El tamaño máximo del archivo es de 20 MB.',
            'authors.*.required' => 'El autor es obligatorio.',
            'authors.*.min' => 'Debe proporcionar al menos un autor.',
            'publication_date.required' => 'Debes asignar la fecha de publicación del articulo.',
            'publication_date.date' => 'La fecha de publicación debe ser una fecha válida.',
            'article_year.required' => 'Debes de asignar el año del articulo.',
            'article_year.integer' => 'El año del artículo debe ser un número entero.',
            'article_volume.required' => 'Debes asignar el volumen del articulo.',
            'article_volume.integer' => 'El volumen del artículo debe ser un número entero.',
            'article_number.required' => 'Debes asignar el número del articulo.',
            'article_number_pages.required' => 'Debes asignar el número de páginas del articulo.',
            'article_number_pages.integer' => 'El número de páginas del artículo debe ser un número entero.',
            'isnn.required' => 'Debes asignar el ISNN articulo.',
            'category.required' => 'Por favor, selecciona una categoria para el artículo.',
            'status.required' => 'Por favor, selecciona un estado para el artículo.',
        ];
    }
}
