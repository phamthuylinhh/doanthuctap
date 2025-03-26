<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DebtResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'amount_paid' => $this->amount_paid,
            'customer_id' => $this->customer_id,
            'customer' => new CustomerResource($this->customer),
            'date_by' => $this->date_by,
            'date_payment' => $this->date_payment,
            'due_date' => $this->due_date,
            'installment_amount' => $this->installment_amount,
            'payment_method' => $this->payment_method,
            'product_id' => $this->product_id,
            'status' => $this->status,
            'status_payment' => $this->status_payment,
            'total_amount' => $this->total_amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
