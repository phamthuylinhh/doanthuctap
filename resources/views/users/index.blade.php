<x-auth-layout>
    <x-slot:title>
        Users
    </x-slot:title>
    <x-hero :title="'Users'" :contr="' User'" />

    <?php
    $columns = [
        [
            'name' => 'Id',
            'key' => 'id',
            'width' => '20px',
        ],
        [
            'name' => 'Tên nhân viên',
            'key' => 'name',
            'width' => '100px',
        ],
        [
            'name' => 'Email',
            'key' => 'email',
            'width' => '100px',
        ],
        [
            'name' => 'Số điện thoại',
            'key' => 'phone',
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
        'active' => 'text-info',
        'inactive' => 'text-danger',
    ];

    ?>
    <x-table :controller="'users'" :columns="$columns" :title="'User'">
        @foreach ($users as $user)
            <tr>
                <td class='sticky-left text-center fs-sm'>{{ $user['id'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $user['name'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $user['email'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $user['phone'] }}</td>
                <td class="text-muted fs-sm fs-sm">{{ $user['phone'] }}</td>
                <td class=" sticky-right">
                    <div class="btn-group">
                        <button type="button" class=" " data-bs-toggle="tooltip" title="Edit">
                            <a class="w-full btn btn-sm btn-alt-secondary"
                                href="{{ route('users.edit', $user['id']) }}"><i class="fa fa-fw fa-pencil-alt"></i></a>
                        </button>
                        <button type="button"
                            class="popup btn btn-sm btn-alt-secondary relative inline-block cursor-pointer"
                            data-bs-toggle="tooltip" onclick="showPopup(this)">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                        <div id="myPopup" class="popup-content">
                            <div class="cursor-pointer text-gray-500 py-1 px-2 block !mb-0 rounded-sm hover:text-[#fff] border-[#d5d5d5] hover:bg-[#dddddd] border-[1px]"
                                onclick="unShowPopup(this)">
                                {{ __('Cancel') }}
                            </div>
                            <div
                                class="cursor-pointer text-red-500 py-1 px-2 block !mb-0 rounded-sm border-[#fd9292] hover:bg-[#ff5a5a] hover:text-[#fff] border-[1px]">
                                <form class="m-0" method="POST" action="{{ route('users.edit', $user['id']) }} }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ __('Delete') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    <script>
        const users = @json($users);
        console.log(users);
    </script>
</x-auth-layout>
