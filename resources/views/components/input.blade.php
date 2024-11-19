@props(['for', 'value' => null, 'error' => null])
<div class="mb-4">
    <x-input-label for="{{ $for }}" :value="ucfirst($for)" />
    <input value="{{ $value }}" {!! $attributes->merge(['class' => 'form-control select2-container']) !!}>
    <x-input-error :messages="$error" class="mt-2" />
</div>
