@props(["name" => false, "route" => false, "slot" => false])
{{-- <a wire:navigate href="{{ route($route) }}"  :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis($route) }}' }" class="flex items-center h-10 p-2 px-5 transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
    <span aria-hidden="true">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            {{ $slot }} 
        </svg>
    </span>
    <span class="ml-2 " :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">{{ $name }}</span>
</a> --}}

<a wire:navigate href="{{ route($route) }}" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis($route) }}', 'px-5 rounded-md': isSidebarExpanded, 'mx-3 px-auto rounded-full ': !isSidebarExpanded }" class="flex h-9 py-2 text-white transition-colors hover:bg-primary-lighter dark:text-light dark:hover:bg-primary" x-data="{ showTooltip: false }" @mouseover="showTooltip = true" @mouseleave="showTooltip = false">
  <span aria-hidden="true" :class="{ 'mx-auto': !isSidebarExpanded }" class="h-5 w-5">
    <svg class="h-5 w-5 font-bold" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      {{ $slot }}
    </svg>
  </span>
  <template x-if="isSidebarExpanded">
    <span class="ml-2">{{ $name }}</span>
  </template>
  <div x-cloak x-show="showTooltip" :class="{ 'hidden': isSidebarExpanded }" class="absolute left-20 z-50 mt-2 rounded-md bg-black p-2 text-white">
    {{ $name }}
  </div>
</a>