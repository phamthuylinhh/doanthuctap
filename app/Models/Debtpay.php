<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Debtpay extends Model
{
    use HasFactory;
    protected $guarded = ['customer', 'debt'];
    protected $table = 'debt_pays';

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function debt(): BelongsTo
    {
        return $this->belongsTo(Debt::class);
    }
}
