<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'description' => ['nullable', 'string'],
            'duration_minutes' => ['sometimes', 'integer'],
            'price' => ['sometimes', 'numeric'],
            'professional_id' => ['sometimes', 'exists:professionals,id'],
        ];
    }
}
