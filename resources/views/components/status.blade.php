@props(['slot' =>false , 'type' =>false])

@if ($type=='info')
    <span {!! $attributes->merge(['class' => 'cursor-pointer inline-flex items-center  text-white text-sm font-medium px-2.5 py-0.5 rounded-md dark:bg-info']) !!}>
        {{ $slot }}
    </span>
@elseif($type=='success')
    <span {!! $attributes->merge(['class' => 'cursor-pointer inline-flex items-center  text-white text-sm font-medium px-2.5 py-0.5 rounded-md dark:bg-success']) !!}>
        {{ $slot }}
    </span>
@elseif($type=='warning')
    <span {!! $attributes->merge(['class' => 'cursor-pointer inline-flex items-center  text-white text-sm font-medium px-2.5 py-0.5 rounded-md dark:bg-warning']) !!}>
        {{ $slot }}
    </span>
@elseif($type=='danger')
    <span {!! $attributes->merge(['class' => 'cursor-pointer inline-flex items-center  text-white text-sm font-medium px-2.5 py-0.5 rounded-md dark:bg-danger']) !!}>
        {{ $slot }}
    </span>
@else
    <span {!! $attributes->merge(['class' => 'cursor-pointer inline-flex items-center  text-white text-sm font-medium px-2.5 py-0.5 rounded-md dark:bg-primary']) !!}>
        {{ $slot }}
    </span>
@endif