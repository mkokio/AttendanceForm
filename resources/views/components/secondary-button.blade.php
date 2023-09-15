<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-secondary bg-secondary text-white']) }}>
    {{ $slot }}
</button>
