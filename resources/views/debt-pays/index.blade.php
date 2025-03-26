<x-auth-layout>
    <x-slot:title>
        Dept pays
    </x-slot:title>
    <x-hero :title="'Dept pays'" :contr="'Dept pays'" />
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
            'name' => 'Customer',
            'key' => 'customer',
        ],
        [
            'name' => 'Amount',
            'key' => 'amount',
        ],
        [
            'name' => 'Date payment',
            'key' => 'date_payment',
        ],
        // [
        //     'name' => 'Debt',
        //     'key' => 'debt',
        // ],
        [
            'name' => 'Payment method',
            'key' => 'payment_method',
        ],
        [
            'name' => 'Status',
            'key' => 'status',
        ],
        [
            'name' => 'Actions',
            'key' => 'actions',
            'width' => '20px',
        ],
    ];

    $colors = [
        'Đã duyệt' => 'text-info',
        'Chưa duyệt' => 'text-warning',
    ];
    ?>
    <x-table :controller="'debt-pays'" :columns="$columns" :title="'Dept pays'">
        @foreach ($debt_pays as $dp)
            <tr>
                <td class='sticky-left text-center fs-sm'>{{ $dp['id'] }}</td>
                <td class="fw-semibold fs-sm">{{ $dp['customer']->name }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $dp['amount'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $dp['date_payment'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $dp['payment_method'] }}</td>
                <td class="d-none d-sm-table-cell">
                    <span
                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light {{ $colors[$dp['status']] }} ">{{ $dp['status'] }}</span>
                </td>
                <td class=" sticky-right">
                    <div class="btn-group">
                        <button type="button" class=" " data-bs-toggle="tooltip" title="Edit">
                            <a class="w-full btn btn-sm btn-alt-secondary"
                                href="{{ route('debt-pays.edit', $dp['id']) }}"><i
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
                                    action="{{ route('debt-pays.destroy', $dp['id']) }} }}">
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
