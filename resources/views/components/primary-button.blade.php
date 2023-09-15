<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary bg-primary text-white']) }}>
    {{ $slot }}
</button>
