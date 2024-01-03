@props([ "disabled" => false, "slot" => false,"btntext" => false,"svg" => false,])

<div class="overflow-hidden border bg-primary py-2 font-semibold dark:border-primary-darker dark:text-light">
  <div class="grid grid-cols-2 md:grid-cols-2">
    <p class="text-md ml-2 flex align-middle text-lg font-medium text-white">{{ $slot }}</p>
    <div class="flex justify-end">
      <a wire:navigate {{ $disabled ? "disabled" : "" }} {{ $attributes->merge(["type" => "submit", "class" => "inline-flex text-primary bg-primary-50 border hover:bg-primary-darker hover:text-white items-center border px-4 py-2 mr-2 rounded-md font-semibold text-sm tracking-widest"]) }}>
        {{ $svg }}
        {{ $btntext }}
      </a>
    </div>
  </div>
</div>
