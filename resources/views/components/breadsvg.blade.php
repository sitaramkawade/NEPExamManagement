<!-- x-breadsvg.blade.php -->
<svg {{ $attributes->merge(['class' => 'w-6 h-6', 'xmlns'=>'http://www.w3.org/2000/svg','fill'=>'none','viewBox'=>'"0 0 24 24','stroke-width'=>'1.5','stroke'=>'currentColor','data-slot'=>'icon']) }}>
    {{ $slot }}
</svg>
