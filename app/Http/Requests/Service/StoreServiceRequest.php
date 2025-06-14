<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'duration_minutes' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'professional_id' => ['required', 'exists:professionals,id'],
        ];
    }
}
