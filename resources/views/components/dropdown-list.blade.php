<div class="mb-3">
    <label for="{{ $for }}" class="form-label">{{ $label }}</label><br />
    <select name="{{ $name }}" id="{{ $for }}" class="w-50">
        <option value="">{{ $placeholder }}</option>
        {{ $slot }}
    </select>
</div>
