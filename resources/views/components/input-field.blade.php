<div class="mb-3">
    <label for="{{ $for }}" class="form-label">{{ $label }}</label><br />
    <textarea id="{{ $for }}" name="{{ $for }}" rows="{{ $rows ?? 1 }}" 
        maxlength="{{ $maxlength ?? 256 }}" class="w-100" title="必要に応じて編集してください">{{ $slot }}</textarea>
</div>
