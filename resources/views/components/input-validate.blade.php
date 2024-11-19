@props(['for', 'value' => null, 'name' => null, 'error' => null])
<div>
    <x-input-label for="{{ $for }}">
        {{ ucfirst($for) }}
        <span class = "text-danger">*</span>
    </x-input-label>
    <input value="{{ $value }}" name="{{ $name }}" {!! $attributes->merge(['class' => 'form-control ']) !!}>
    <x-input-error :messages="$error" class="mt-2" />
</div>
