<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Holiday extends Model
{
    use HasFactory;
    protected $guarded = ['category'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(HolidayCategory::class, 'category_id');
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($holiday) {
            $start = Carbon::parse($holiday['started_at']);
            $end = Carbon::parse($holiday['ended_at']);
            $holiday['day'] = $start->diffInDays($end);
        });

        static::updating(function ($holiday) {
            $start = Carbon::parse($holiday['started_at']);
            $end = Carbon::parse($holiday['ended_at']);
            $holiday['day'] = $start->diffInDays($end);
        });
    }


}
