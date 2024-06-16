<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class DestinationCreateRequest extends FormRequest
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
        return [
            'name_destination' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'location' => 'required|string',
            'price_range' => 'required|numeric|regex:/^[0-9]+$/',
            'status' => 'required|string|in:active,inactive',
            'opening_hours' => 'array',
            'opening_hours.*.day' => 'required|string|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'opening_hours.*.open' => 'required_with:opening_hours.*.day,opening_hours.*.close|string',
            'opening_hours.*.close' => 'required_with:opening_hours.*.day,opening_hours.*.open|string',
            'opening_hours.*.is_closed' => 'boolean|nullable',
            'galleries.*' => 'required|image|mimes:jpeg,png,jpg|max:1048|',
            'facilities' => 'array',
            'facilities.*' => 'nullable|string',
            'accommodations' => 'array',
            'accommodations.*' => 'nullable|string',
            'contact_details' => 'array',
            'contact_details.*.type' => 'required|string|in:phone,email,fax,social_media',
            'contact_details.*.value' => 'required|string|max:50'
        ];
    }

    public function messages()
    {
        return [
            'price_range.regex' => 'Harap isi dengan angka!',
            'status.in' => 'Status harus berisi active atau inactive!',
            'opening_hours.*.day.in' => 'Jangan masukkan hari lain!',
            'opening_hours.*.open.required_with' => 'Jam buka harus diisi!',
            'opening_hours.*.close.required_with' => 'Jam tutup harus diisi!',
        ];
    }
}
