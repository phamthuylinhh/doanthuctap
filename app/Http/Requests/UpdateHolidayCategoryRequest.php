<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;
use Illuminate\Support\Facades\Auth;
class UpdateHolidayCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        // $user = $request->user();

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
            // 'code' => 'required|string|unique:holiday_categories,code',
            // 'name' => 'required|string',
        ];
    }
}
