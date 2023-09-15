<div class="mb-3">
    <label for="{{ $for }}" class="form-label">{{ $label }}</label>
    <textarea id="{{ $for }}" name="{{ $for }}" rows="{{ $rows ?? 1 }}" maxlength="{{ $maxlength ?? 256 }}" class="form-control">{{ old($for) }}</textarea>
</div>
