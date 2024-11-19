@props(['name', 'label', 'options', 'selected' => null, 'error' => null, 'required' => false])

<div class="mb-4">
    <label class="form-label" for="{{ $name }}">{{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <select {!! $attributes->merge(['class' => 'form-select']) !!} id="{{ $name }}" name="{{ $name }}">
        @foreach ($options as $option)
            @if ($loop->first)
                <option value="{{ null }}" @selected($selected == null)>
                </option>
            @endif
            <option value="{{ $option->id ?? $option }}" @selected($selected == ($option->id ?? $option))>
                {{ $option->name ?? ($option->id ?? $option) }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$error" class="mt-2" />
</div>
