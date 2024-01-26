@props(["disabled" => false, "slot" => false])

<td {{ $disabled ? "disabled" : "" }} {!! $attributes->merge(["class" => "whitespace-nowrap px-2  py-0 text-sm font-medium"]) !!}>
  {{ $slot }}
</td>
