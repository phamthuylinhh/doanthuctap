<x-auth-layout>
    <x-slot:title>
        Salary
    </x-slot:title>
    <x-hero :title="'Salary'" />

    <?php

    $columns = [
        [
            'name' => 'id',
            'key' => 'id',
            'width' => '20px',
        ],
        [
            'name' => 'user',
            'key' => 'user',
            'width' => '200px',
        ],
        [
            'name' => 'salary',
            'key' => 'salary',
            'width' => '200px',
        ],
        [
            'name' => 'subsidy',
            'key' => 'subsidy',
        ],
        [
            'name' => 'fund',
            'key' => 'fund',
        ],
        [
            'name' => 'insurance',
            'key' => 'insurance',
        ],
        [
            'name' => 'paid leave',
            'key' => 'paid_leave',
        ],
        [
            'name' => 'average salary',
            'key' => 'average_salary',
        ],
        [
            'name' => 'started at',
            'key' => 'started_at',
        ],
        [
            'name' => 'ended at',
            'key' => 'ended_at',
        ],
        [
            'name' => 'Action',
            'key' => 'action',
            'width' => '20px',
        ],
    ];

    ?>
    <x-table :controller="'Salary'" :columns="$columns" :title="'Salaries'">
        @foreach ($salaries as $salary)
            <tr>
                <td class='sticky-left text-center fs-sm'>{{ $salary['id'] }}</td>
                <td class="fw-semibold fs-sm">{{ $salary['user']->name }}</td>
                <td class="text-muted fs-sm">{{ $salary['salary'] }}</td>
                <td class="text-muted fs-sm">{{ $salary['subsidy'] }}</td>
                <td class="text-muted fs-sm">{{ $salary['fund'] }}</td>
                <td class="text-muted fs-sm">{{ $salary['insurance'] }}</td>
                <td class="text-muted fs-sm">{{ $salary['paid_leave'] }}</td>
                <td class="text-muted fs-sm">{{ $salary['average_salary'] }}</td>
                <td class="text-muted fs-sm">{{ $salary['started_at'] }}</td>
                <td class="text-muted fs-sm">{{ $salary['ended_at'] }}</td>

                <td class="sticky-right">
                    <div class="btn-group">
                        <button type="button" class=" " data-bs-toggle="tooltip" title="Edit">
                            <a class="w-full btn btn-sm btn-alt-secondary"
                                href="{{ route('salaries.edit', $salary['id']) }}"><i
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
                                    action="{{ route('salaries.destroy', $salary['id']) }}">
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
