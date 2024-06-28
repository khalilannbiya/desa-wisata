<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'location' => 'required|string',
            'gmaps_url' => 'required|string|url:http,https',
            'image' => 'image|mimes:jpeg,png,jpg|max:1048|',
            'start_date' => 'required|date|after_or_equal:now',
            'end_date' => 'required|date|after_or_equal:now'
        ];

        if (auth()->user()->role === 'super_admin') {
            $rules['admin'] = 'required';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'start_date.after_or_equal' => 'Tanggal dan waktu acara harus merupakan tanggal dan waktu setelah atau sama dengan sekarang',
            'end_date.after_or_equal' => 'Tanggal dan waktu acara harus merupakan tanggal dan waktu setelah atau sama dengan sekarang',
        ];
    }
}
