<x-auth-layout>
    <x-slot:title>
        Leave request
    </x-slot:title>
    <x-hero :title="'Leave request'" :contr="'leave_requests'" />
    {{-- @each('components.lists.item', $customers, 'value') --}}
    <?php
    // Cấu trúc $columns theo dạng sau:
    $columns = [
        [
            'name' => 'Id',
            'key' => 'id',
            'width' => '20px',
        ],
        [
            'name' => 'Nhân viên',
            'key' => 'user_id',
        ],
        [
            'name' => 'Lý do',
            'key' => 'description',
        ],
        [
            'name' => 'Ngày bắt đầu',
            'key' => 'started_at',
        ],
        [
            'name' => 'Ngày kết thúc',
            'key' => 'ended_at',
        ],
        [
            'name' => 'Trạng thái',
            'key' => 'status',
        ],
        [
            'name' => 'Actions',
            'key' => 'actions',
            'width' => '20px',
        ],
    ];
    
    $colors = [
        'Đang phê duyệt' => 'text-warning',
        'Đã phê duyệt' => 'text-info',
        'Không phê duyệt' => 'text-danger',
    ];
    
    ?>
    <x-table :controller="'leave_requests'" :columns="$columns" :title="'Leave requests'">
        @foreach ($leave_requests as $request)
            <tr>
                <td class='sticky-left text-center fs-sm'>{{ $request['id'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $request['user']->name }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $request['description'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $request['started_at'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $request['ended_at'] }}</td>
                <td class="d-none d-sm-table-cell">
                    <span
                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light {{ $colors[$request['status']] }} ">{{ $request['status'] }}</span>
                </td>
                <td class=" sticky-right">
                    <div class="btn-group">
                        <button type="button" class=" " data-bs-toggle="tooltip" title="Edit">
                            <a class="w-full btn btn-sm btn-alt-secondary"
                                href="{{ route('leave_requests.edit', $request['id']) }}"><i
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
                                    action="{{ route('leave_requests.destroy', $request['id']) }} }}">
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
