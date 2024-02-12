@props(['slot'=>false ,'action'=>false ,'method'=>'POST' ,'target'=>'_self' ])
<form action="{{ $action }}" class="inline" method="POST" target="{{ $target }}">
    @csrf
    @method($method)
    <button  {{ $attributes->merge(['type' => 'submit', 'class' => ' inline-flex items-center justify-center rounded-xl my-0.5 border-2  px-3 py-2 my-1 text-md font-semibold text-gray-800 transition text-white ']) }} >
        {{ $slot }}
    </button>
</form>