<?php

namespace App\Models;
use Carbon\Carbon;
use Date;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    use HasFactory;
    protected $table = "work_days";
    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($workday) {
            $start = Carbon::parse($workday['started_at']);
            $end = Carbon::parse($workday['ended_at']);
            $workday['day'] = $start->diffInDays($end);
        });

        static::updating(function ($workday) {
            $start = Carbon::parse($workday['started_at']);
            $end = Carbon::parse($workday['ended_at']);
            $workday['day'] = $start->diffInDays($end);
        });
    }
}
