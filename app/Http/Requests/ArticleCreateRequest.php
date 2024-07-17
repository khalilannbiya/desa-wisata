<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:75',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:1048'
        ];

        if (auth()->user()->role != 'writer') {
            $rules['writer'] = 'required';
        }

        return $rules;
    }
}
