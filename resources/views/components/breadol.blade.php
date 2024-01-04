<!-- x-breadol.blade.php -->
<ol {{ $attributes->merge(['class' => 'inline-flex items-center']) }}>
    {{ $slot }}
</ol>
