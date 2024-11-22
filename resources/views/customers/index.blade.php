<x-auth-layout>
    <x-slot:title>
        Customers
    </x-slot:title>
    <x-hero :title="'Customers'" />
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
            'name' => 'Name',
            'key' => 'name',
        ],
        [
            'name' => 'Email',
            'key' => 'email',
        ],
        [
            'name' => 'Phone',
            'key' => 'phone',
        ],
        [
            'name' => 'Actions',
            'key' => 'actions',
            'width' => '20px',
        ],
    ];

    ?>
    <x-table :datas="$customers" :controller="'customers'" :columns="$columns" :title="'Customers'" />
</x-auth-layout>
