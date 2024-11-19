<?php

namespace App\Http\Requests;

use App\Models\Enums\StatusLeaveRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateLeaveRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        $user = $request->user();
        return $user->can('leave_requests.update', $user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'started_at' => 'required|date_format:Y-m-d',
            'ended_at' => 'required|date_format:Y-m-d',
            'description' => 'required|string',
            'status' => [
                'required',
                'string',
                Rule::enum(StatusLeaveRequest::class),
            ],
        ];
    }
}
