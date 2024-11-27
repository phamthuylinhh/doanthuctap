<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalaryRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'salary' => ['required', 'numeric'],
            'subsidy' => ['nullable', 'numeric'],
            'fund' => ['nullable', 'numeric'],
            'insurance' => ['nullable', 'numeric'],
            'paid_leave' => ['nullable', 'numeric'],
            'started_at' => ['required', 'date'],
            'ended_at' => ['required', 'date'],
            // 'day' => ['required', 'date'],
        ];
    }
}
