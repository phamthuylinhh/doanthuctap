<?php

namespace App\Models\Enums;

enum DebtpayStatusEnum: string
{
    case approved = 'Đã duyệt';
    case pending = 'Chưa duyệt';
}
