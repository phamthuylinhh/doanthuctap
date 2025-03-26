<?php



namespace App\Http\Requests;
use App\Models\Enums\DebtPayStatusEnum;
use App\Models\Enums\PaymentMethodEnum;
use App\Models\Enums\SatusPaymentEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateDebtsRequest extends FormRequest
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
            'due_date' => 'required|numeric|min:0|max:31',
        ];
    }
}
