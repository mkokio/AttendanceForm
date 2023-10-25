@props(['disabled' => false])
<div class="mt-0 b-0">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-100']) !!}>
</div>