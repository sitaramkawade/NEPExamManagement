@props(['btntext'=> false,'href' => false,'svg' => false,])

<a  href="{{ $href }}" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 rounded-md font-semibold text-sm text-white tracking-widest']) }}>
    {{ $svg }}
    {{ $btntext }}
</a>
