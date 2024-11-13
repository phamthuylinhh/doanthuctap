<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        $user = $this->user();
        return $user->can('users.update');

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'status' => 'required|in:active, inactive',
            'phone' => 'nullable|string|max:11',
            'address' => 'nullable|string',
            'password' => 'required|string|min:8',
            'current_password' => 'required|same:password',
            'started_at' => 'required|date_format:Y-m-d',
            'ended_at' => 'nullable|date_format:Y-m-d|required_if:status,inactive',

        ];
    }
}
