@props([ 'slot'=>false ,'id'=>rand(1111, 9999) , 'name'=>'no_name'])

<div wire:ignore>
    <select  id="{{ $id }}"    {!! $attributes->merge(['class' => '']) !!} >
       {{$slot}}
    </select>
</div>


@push('scripts')
<script>
    $(document).ready(function () 
    {
        $('#{{ $id }}').select2({
            templateSelection: function (data) 
            {
                if (data.id === '') 
                {
                    return '-- Select An Option --';
                }
                return data.text;
            }
        });
        $('#{{ $id }}').on('change', function (e) {
            var data = $('#{{ $id }}').select2("val");
        @this.set('{{ $name }}', data);
        });
    });
</script>   
@endpush
