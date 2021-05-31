<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class PostDeleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->can('delete posts');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'numeric|exists:posts,id'
        ];
    }
}
