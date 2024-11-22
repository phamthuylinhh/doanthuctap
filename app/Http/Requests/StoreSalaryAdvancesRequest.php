<?php

namespace App\Http\Requests;
use App\Models\Enums\SalaryAdvancesEnum;
use App\Models\Enums\StatusLeaveRequest;
use Illuminate\Foundation\Http\FormRequest;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StoreSalaryAdvancesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            Rule::enum(SalaryAdvancesEnum::class),
        ];
    }
}
