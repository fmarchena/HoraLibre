<?php
namespace App\Http\Requests\Professional;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfessionalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:professionals,email'],
            'specialty_id' => ['required', 'exists:specialties,id'],
        ];
    }
}
