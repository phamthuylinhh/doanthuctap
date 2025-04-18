<?php

namespace App\View\Components;

use App\Http\Resources\UserResource;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $nav = [
            [
                'name' => "Dashboard",
                'link' => ""
            ],
            [
                'name' => "Nguời dùng",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/users/create"
                    ],
                    [
                        'name' => "Người dùng",
                        'link' => "/admin/users"
                    ],
                ]
            ],
            [
                'name' => "Nghỉ phép",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/leave_requests/create"
                    ],
                    [
                        'name' => "Nghỉ phép",
                        'link' => "/admin/leave_requests"
                    ]
                ]
            ],
            [
                'name' => "Ứng lương",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/salary_advances/create"
                    ],
                    [
                        'name' => "Ứng lương",
                        'link' => "/admin/salary_advances"
                    ]
                ]
            ],
            [
                'name' => "Ngày nghỉ",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/holidays/create"
                    ],
                    [
                        'name' => "Ngày nghỉ",
                        'link' => "/admin/holidays"
                    ]
                ]
            ],
            [
                'name' => "Danh mục ngày nghỉ",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/holiday-categories/create"
                    ],
                    [
                        'name' => "Danh mục ngày nghỉ",
                        'link' => "/admin/holiday-categories"
                    ]
                ]
            ],
            [
                'name' => "Ngày công",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/work_days/create"
                    ],
                    [
                        'name' => "Ngày công",
                        'link' => "/admin/work_days"
                    ]
                ]
            ],
            [
                'name' => "Khách hàng",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/customers/create"
                    ],
                    [
                        'name' => "Khách hàng",
                        'link' => "/admin/customers"
                    ]
                ]
            ],
            [
                'name' => "Nợ",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/debts/create"
                    ],
                    [
                        'name' => "Nợ",
                        'link' => "/admin/debts"
                    ]
                ]
            ],

            [
                'name' => "Thanh toán ",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/debt-pays/create",

                    ],
                    [
                        'name' => "Thanh toán",
                        'link' => "/admin/debt-pays"
                    ]
                ]
            ],
            [
                'name' => "Lương tháng",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/salaries/create"
                    ],
                    [
                        'name' => "Lương tháng",
                        'link' => "/admin/salaries"
                    ]
                ]
            ]




        ];
        $user = request()->user();
        return view('layouts.auth', [
            'nav' => $nav,
            'user' => new UserResource($user)
        ]);
    }
}
