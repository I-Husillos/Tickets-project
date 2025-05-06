<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|in:bug,improvement,request',
            'priority' => 'required|in:low,medium,high,critical',
            'status' => 'required|in:new,in_progress,pending,resolved,closed',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'description.required' => 'La descripción es obligatoria.',
            'type.required' => 'El tipo es obligatorio.',
            'priority.required' => 'La prioridad es obligatoria.',
            'status.required' => 'El estado es obligatorio.',
        ];
    }
}
