@props(['href' => '', 'text' => ''])
<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-dark']) }}>
    {{ $slot }}
    {{ $text }}
</a>
