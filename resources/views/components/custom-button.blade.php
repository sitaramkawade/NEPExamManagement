@props(['class'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-2 px-2 rounded-md my-2 ' . $class]) }}>
    {{ $slot }}
</button>
