<div class="mb-3">
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary bg-primary text-white']) }}>
        {{ $slot }}
    </button>
</div>