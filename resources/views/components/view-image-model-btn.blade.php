@props(['src'=>"" ,'slot'=>false])

<button onclick="openModal('{{ $src }}')"  {!! $attributes->merge(['class' => 'bg-primary mb-2 text-xs text-white py-1 px-2 rounded']) !!} >{{ $slot }}</button>