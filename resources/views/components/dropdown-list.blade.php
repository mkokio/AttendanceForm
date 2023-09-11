<div>
    <label for="{{ $for }}">{{ $label }}</label><br>
    <select name="{{ $name }}" id="{{ $for }}" label="{{ $label }}">
        <option value="">{{ $placeholder }}</option>
        {{ $slot }}
    </select>
</div>


