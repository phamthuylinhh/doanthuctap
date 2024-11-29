<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salary extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function leave_requests()
    {
        return $this->hasMany(LeaveRequest::class, 'user_id', 'user_id');
    }


    protected static function boot()
    {
        parent::boot();


        static::creating(function ($salary) {
            $salary->calculateAverageSalary();
        });


        static::updating(function ($salary) {
            $salary->calculateAverageSalary();
        });
    }


    public function calculateAverageSalary()
    {
        if ($this->started_at && $this->ended_at) {
            $start = Carbon::parse($this->started_at);
            $end = Carbon::parse($this->ended_at);


            $total_days = $start->diffInDays($end) + 1;
            if ($total_days > 0) {
                $this->average_salary = $this->salary / $total_days;
            }
        }
    }


    public function calculateSalary()
    {

        $approved_leave_days = $this->leave_requests()
            ->where('status', 'Đã phê duyệt')
            ->whereBetween('started_at', [$this->started_at, $this->ended_at])
            ->orWhereBetween('ended_at', [$this->started_at, $this->ended_at])
            ->get();


        $total_leave_days = $approved_leave_days->sum(function ($leave) {
            $start = Carbon::parse(max($leave->started_at, $this->started_at));
            $end = Carbon::parse(min($leave->ended_at, $this->ended_at));
            return $start->diffInDays($end) + 1;
        });


        $salary_per_day = $this->salary / 26;
        $paid_leave_salary = min($total_leave_days, $this->paid_leave) * $salary_per_day;


        $adjusted_salary = $this->salary + $this->subsidy - $this->fund - $this->insurance - $paid_leave_salary;


        $total_working_days = 26 - min($total_leave_days, $this->paid_leave);


        $average_salary = $adjusted_salary / $total_working_days;

        return [
            'total_salary' => round($adjusted_salary, 2),
            'total_leave_days' => $total_leave_days,
            'total_working_days' => $total_working_days,
            'salary_per_day' => round($salary_per_day, 2),
            'average_salary' => round($average_salary, 2),
        ];
    }
}
