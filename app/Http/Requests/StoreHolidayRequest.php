<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StoreHolidayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        // $user = $request->user();
        // return $user->can('holidays.create', $user);
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
            //
            // 'category_id' => 'required|exists:holiday_categories,id',
            // 'started_at' => 'required|date_format:Y-m-d',
            // 'ended_at' => 'required|date_format:Y-m-d',
        ];
    }
}
