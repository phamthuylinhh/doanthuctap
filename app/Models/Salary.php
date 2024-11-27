<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salary extends Model
{
    use HasFactory;
    protected $guarded = ['user'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($salary) {
            $start = Carbon::parse($salary['started_at']);
            $end = Carbon::parse($salary['ended_at']);
            $salary['days'] = $start->diffInDays($end);
        });

        static::updating(function ($salary) {
            $start = Carbon::parse($salary['started_at']);
            $end = Carbon::parse($salary['ended_at']);
            $salary['days'] = $start->diffInDays($end);
        });
    }

    public function leave_requests()
    {
        return $this->hasMany(LeaveRequest::class, 'user_id', 'user_id');
    }

    public function calculateSalary()
    {
        $leave_requests = $this->leave_requests();
        $total_leave_days = $leave_requests->where('status', 'Đã phê duyệt')->count();

        $salary = $this->salary;
        $is_check_paid_leave = $total_leave_days >= $this->paid_leave;
        $total_day = 26 - ($is_check_paid_leave ? $this->paid_leave - $total_leave_days : 0);
        $salary_per_day = $salary / $total_day;
        $total_salary = $total_day * $salary_per_day;

        $total_salary += $this->subsidy;
        $total_salary -= $this->fund;
        $total_salary -= $this->insurance;
        return [
            'total_salary' => $total_salary,
            'total_leave_days' => $total_leave_days,
            'total_day' => $total_day,
            'salary_per_day' => $salary_per_day,
        ];
    }
}
