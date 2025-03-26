<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Debt extends Model
{
    use HasFactory;
    protected $guarded = ['customer'];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
