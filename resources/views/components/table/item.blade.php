@props(['data', 'columns'])
<?php
$data = json_decode(json_encode($data), true);
?>

@foreach ($columns as $key => $column)
    @switch($column['key'])
        @case('id')
            <td {!! $attributes->merge([
                'class' => $loop->first ? 'sticky-left' : ($loop->last ? 'sticky-right' : '') . 'text-center fs-sm',
            ]) !!}>{{ $data[$column['key']] ?? '' }}</td>
        @break

        @case('name')
            <td class="fw-semibold fs-sm">{{ $data[$column['key']] ?? '' }}</td>
        @break

        @case('status')
            <td class="d-none d-sm-table-cell">
                <span
                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{ $data[$column['key']] }}</span>
            </td>
        @break

        @default
            @if ($column['key'] === 'actions')
            @break
        @endif
        <td class="text-muted fs-sm fs-sm">{{ $data[$column['key']] ?? '' }}</td>
@endswitch
@endforeach
