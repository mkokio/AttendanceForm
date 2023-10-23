@props(['disabled' => false])
<div class="mb-3">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-100']) !!}>
</div>