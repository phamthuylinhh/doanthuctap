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
                'link' => "/admin/dashboard"
            ],
            [
                'name' => "Nguời dùng",
                'children' => [
                    [
                        'name' => "Thêm mới",
                        'link' => "/admin/users/create"
                    ],
                    [
                        'name' => "Nguòi dùng",
                        'link' => "/admin/urses"
                    ],
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
