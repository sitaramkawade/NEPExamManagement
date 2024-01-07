@props(["disabled" => false, "slot" => false])

<button type="button" {{ $disabled ? "disabled" : "" }} {!! $attributes->merge(["class" => "inline-flex text-white  cursor-pointer"]) !!}>
  <span class="inline-flex items-center justify-center rounded-md bg-green-700 p-1.5 shadow-lg">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-1 h-5 w-5 dark:text-white">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
    </svg>
    {{ $slot }}
  </span>
</button>