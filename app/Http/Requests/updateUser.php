<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUser extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'username' => ['required', 'string'],
            'matricule' => ['required', 'string', 'regex:/[A-Z]{4}(-)[0-9]{5}/', 'max:11' , ],
        ];
    }
}
