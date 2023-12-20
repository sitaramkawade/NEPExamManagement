@props(['disabled' => false, 'text' => ''])

<span {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-1 text-xs font-medium uppercase tracking-wide rounded-lg bg-opacity-40 ']) !!}>{{ $text }}</span>
