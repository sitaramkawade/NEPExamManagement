@props(["disabled" => false, "slot" => false])

<td {{ $disabled ? "disabled" : "" }} {!! $attributes->merge(["class" => "whitespace-nowrap px-6 py-1 text-sm font-medium"]) !!}>
  {{ $slot }}
</td>
