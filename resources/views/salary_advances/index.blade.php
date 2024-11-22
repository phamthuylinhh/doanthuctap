<x-auth-layout>
    <x-slot:title>
        Salary_advances |
    </x-slot:title>
    <x-hero :title="' Salary_advances'" />

    <?php

    $columns = [
        [
            'name' => 'id',
            'key' => 'id',
        ],
        [
            'name' => 'user',
            'key' => 'user',
        ],
        [
            'name' => 'Amount',
            'key' => 'Day',
        ],

        [
            'name' => 'Day',
            'key' => 'day',
        ],
        [
            'name' => 'Status',
            'key' => 'status',
        ],
        [
            'name' => 'Description',
            'key' => 'description',
        ],
        [
            'name' => 'Action',
            'key' => 'action',
            'width' => '20px',
        ],
    ];
    $colors = [
        'Đã phê duyệt' => 'text-info',
        'Không phê duyệt' => 'text-danger',
        'Đang phê duyệt' => 'text-warning',
    ];

    ?>
    <x-table :controller="'SalaryAdvances'" :columns="$columns" :title="'Salary_advances'">
        @foreach ($salary_advances as $salary)
            <tr>
                <td class='sticky-left text-center fs-sm'>{{ $salary['id'] }}</td>
                <td class="fw-semibold fs-sm">{{ $salary['user']->name }}</td>
                <td class="text-muted fs-sm">{{ $salary['amount'] }}</td>
                <td class="text-muted fs-sm">{{ $salary['day'] }}</td>
                <td class="d-none d-sm-table-cell">
                    <span
                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light {{ $colors[$salary['status']] }} ">{{ $salary['status'] }}</span>
                </td>
                <td class="text-muted fs-sm">{{ $salary['description'] }}</td>


                <td class="sticky-right">
                    <div class="btn-group">
                        <button type="button" class=" " data-bs-toggle="tooltip" title="Edit">
                            <a class="w-full btn btn-sm btn-alt-secondary"
                                href="{{ route('salary_advances.edit', $salary['id']) }}"><i
                                    class="fa fa-fw fa-pencil-alt"></i></a>
                        </button>
                        <button type="button"
                            class="popup btn btn-sm btn-alt-secondary relative inline-block cursor-pointer"
                            data-bs-toggle="tooltip" onclick="showPopup(this)">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                        <div id="myPopup" class="popup-content">
                            <div class="cursor-pointer text-gray-500 py-1 px-2 block !mb-0 rounded-sm hover:text-[#fff] border-[#d5d5d5] hover:bg-[#dddddd] border-[1px]"
                                onclick="unShowPopup(this)">
                                Cancel
                            </div>
                            <div
                                class="cursor-pointer text-red-500 py-1 px-2 block !mb-0 rounded-sm border-[#fd9292] hover:bg-[#ff5a5a] hover:text-[#fff] border-[1px]">
                                <form class="m-0" method="POST"
                                    action="{{ route('salary_advances.destroy', $salary['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
</x-auth-layout>
