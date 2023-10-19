<div class="form-check">
    <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $id }}" {{ $attributes }}>
    <label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>