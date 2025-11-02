<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'program_id' => ['required', 'exists:programs,id'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:50'],
            'birth_date' => ['required', 'date'],
            'status' => ['sometimes', 'in:pending,approved,rejected'],
            'bac_diploma' => ['sometimes', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
            'birth_certificate' => ['sometimes', 'file', 'mimes:pdf,jpg,png', 'max:2048'],
        ];
    }
}
