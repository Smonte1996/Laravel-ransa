<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-success text-white text-uppercase btn-sm']) }}>
    {{ $slot }}
</button>
