<?php

namespace App\Models\Enums;

enum SatusPaymentEnum: string
{
    case PENDING = 'Chưa hoàn thành';
    case COMPLETED = 'Đã hoàn thành';
    // quá hạn
    case OVERDUE = 'Quá hạn';
}
