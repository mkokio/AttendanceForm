<div>
    <label for="{{ $for }}">{{ $label }}</label><br>
    <textarea id="{{ $for }}" name="{{ $for }}" rows="{{ $rows ?? 1 }}" maxlength="{{ $maxlength ?? 256}}">{{ old($for) }}</textarea>
</div>
