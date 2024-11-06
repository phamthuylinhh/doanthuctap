@props(['items'])

<thead>
    <tr>
        @foreach ($items as $item)
            <th {!! $attributes->merge([
                'class' => $loop->first ? 'sticky-left' : ($loop->last ? 'sticky-right' : '') . ' text-center',
            ]) !!} style="{{ isset($item['width']) ? 'width:' . $item['width'] : 'width: 80px;' }}">
                {{ $item['name'] }}</th>
        @endforeach
    </tr>
</thead>
