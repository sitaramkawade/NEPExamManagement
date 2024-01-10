@props(['slot'=>false])
<span  {!! $attributes->merge(["class" => "block overflow-x-auto p-1  scrollbar-size whitespace-nowrap w-40"]) !!} >
    {{ $slot }}             
</span>