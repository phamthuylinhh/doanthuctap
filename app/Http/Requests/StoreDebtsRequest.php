<?php

namespace App\Http\Requests;
use App\Models\Enums\DebtPayStatusEnum;
use App\Models\Enums\PaymentMethodEnum;
use App\Models\Enums\SatusPaymentEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class StoreDebtsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            // 'customer_id' => 'required|exists:customers,id',
            // 'product_id' => 'required|numeric',
            // 'amount_paid' => 'required|numeric|min:0',
            // 'total_amount' => 'required|numeric|min:0',
            'due_date' => 'required|numeric|min:0|max:31',
            // 'installment_amount' => 'required|numeric|min:0',
            // 'date_buy' => 'required|date_format:Y-m-d',
            // 'date_payment' => 'required|date_format:Y-m-d',
            // 'ended_at' => 'required|date_format:Y-m-d',
            // 'payment_method' => ['required', Rule::enum(PaymentMethodEnum::class)],
            // 'status' => [
            //     'required',
            //     Rule::enum(DebtPayStatusEnum::class)
            // ],
            // 'status_payment' => [
            //     'required',
            //     Rule::enum(SatusPaymentEnum::class)
            // ]
        ];
    }
}
