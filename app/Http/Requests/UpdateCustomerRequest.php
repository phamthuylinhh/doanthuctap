<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        // $user = $request->user();
        // return $user->can('customers.update', $user);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:10',
            'password' => 'nullable|string|min:8',
            'confirm-password' => [
                'required_with:password',
                function ($attribute, $value, $fail) {
                    if ($value !== $this->input('password')) {
                        $fail('The confirm password does not match.');
                    }
                }
            ]
        ];
    }
}
