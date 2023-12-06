<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDoctorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:100',
            'email'=> 'required|email:filter|unique:doctors,email',
            'password'=> 'required|min:3|max:100',
            'phone'=> 'nullable',
            'appoints'=> 'required|array',
            'appoints.*' => 'required',
            'file_name' => 'image|mimes:jpg,png,jpeg',
            'section_id' => 'required|exists:sections,id'

        ];
    }
}
