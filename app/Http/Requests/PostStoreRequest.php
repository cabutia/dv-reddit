<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|max:255',
            'title' => 'required|max:48'
        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'content.required' => 'Escribi algo de contenido por favor.',
            'title.required' => 'No te olvides de escribir un titulo!',
            'title.max' => 'El titulo no puede tener mas de :max caracteres',
        ];
    }
}
