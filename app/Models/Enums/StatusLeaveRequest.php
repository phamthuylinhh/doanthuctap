<?php

namespace App\Models\Enums;

enum StatusLeaveRequest: string
{
    case approved = 'Đã phê duyệt';
    case pending = 'Đang phê duyệt';
    case rejected = 'Không phê duyệt';
}
