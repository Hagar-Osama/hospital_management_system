<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Enums\DoctorStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateDoctorRequest extends FormRequest
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
            'email'=> 'required|email:filter|unique:doctors,email,'.$this->doctorId,
            'password'=> 'min:3|max:100',
            'price'=> 'required',
            'phone'=> 'sometimes',
            // 'appointments'=> 'required|array',
            // 'appointments.*' => 'required',
            'file_name' => 'image|mimes:jpg,png,jpeg',
            'section_id' => 'required|exists:sections,id',
            // 'status' => [Enum::rule(DoctorStatusEnum::class)]

        ];
    }
}
