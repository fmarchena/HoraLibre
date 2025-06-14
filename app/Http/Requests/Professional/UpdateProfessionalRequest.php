<?php
namespace App\Http\Requests\Professional;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfessionalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email', 'unique:professionals,email,' . $this->professional->id],
            'specialty_id' => ['sometimes', 'exists:specialties,id'],
        ];
    }
}