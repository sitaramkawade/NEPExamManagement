@props(["disabled" => false, "slot" => false])

<a {{ $disabled ? "disabled" : "" }} {!! $attributes->merge(["class" => "inline-flex text-white  cursor-pointer"]) !!}>
  <span class="inline-flex items-center justify-center p-1.5  bg-orange-700 rounded-md shadow-lg">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-1 dark:text-white">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
      </svg>
      
    {{ $slot }}
  </span>
</a>
