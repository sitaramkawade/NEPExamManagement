@props([ 'options'=>false ,'slot'=>false ,'action'=>false])
<form  method="post" action="{{ $action }}" id="myForm"  {!! $attributes->merge(['class' => '']) !!}>
   {{$slot}}
</form>