<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ContactDetailUpdateRequest extends FormRequest
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
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|string|max:50',
            'social_media' => 'nullable|string|max:100',
        ];

        if (auth()->user()->role !== 'owner') {
            $rules['owner'] = 'required';
        }

        return $rules;
    }
}
