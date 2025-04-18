<x-auth-layout>
    <x-slot:title>
        Holidays
    </x-slot:title>
    <x-hero :title="'Holidays'" :contr="'holidays'" />
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
            'name' => 'Loại',
            'key' => 'category',
        ],
        [
            'name' => 'Số ngày',
            'key' => 'day',
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
            'name' => 'Actions',
            'key' => 'actions',
            'width' => '20px',
        ],
    ];
    ?>
    <x-table :controller="'holidays'" :columns="$columns" :title="'Holidays'">
        @foreach ($holidays as $holiday)
            <tr>
                <td class='sticky-left text-center fs-sm'>{{ $holiday['id'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $holiday['category']->name }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $holiday['day'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $holiday['started_at'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $holiday['ended_at'] }}</td>
                <td class=" sticky-right">
                    <div class="btn-group">
                        <button type="button" class=" " data-bs-toggle="tooltip" title="Edit">
                            <a class="w-full btn btn-sm btn-alt-secondary"
                                href="{{ route('holidays.edit', $holiday['id']) }}"><i
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
                                    action="{{ route('holidays.destroy', $holiday['id']) }} }}">
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
