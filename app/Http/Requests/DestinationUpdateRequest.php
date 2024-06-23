<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class DestinationUpdateRequest extends FormRequest
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
            'name_destination' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'location' => 'required|string',
            'price_range' => 'required|numeric|regex:/^[0-9]+$/',
            'status' => 'required|string|in:active,inactive',
        ];

        if (auth()->user()->role !== 'owner') {
            $rules['owner'] = 'required';
        }

        return $rules;
    }
}
