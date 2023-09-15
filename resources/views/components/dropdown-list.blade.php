<div class="mb-3">
    <label for="{{ $for }}" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $for }}" class="form-select">
        <option value="">{{ $placeholder }}</option>
        {{ $slot }}
    </select>
</div>
