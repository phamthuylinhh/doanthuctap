<?php

namespace App\Models\Enums;

enum PaymentMethodEnum: string
{
    case cash = 'Thanh toán trực tiếp';
    case bank = 'Chuyển khoản trực tiếp';
}
