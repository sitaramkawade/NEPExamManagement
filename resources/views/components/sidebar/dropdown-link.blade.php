@props(['name' => false, 'route' => false, 'slot' => false])
<a role="menuitem" wire:navigate href="{{ route($route) }}" :class="{ 'bg-primary text-white dark:bg-primary': '{{ request()->routeis($route) }}', 'px-5 rounded-md': isSidebarExpanded, 'mx-3 px-auto rounded-full ': !isSidebarExpanded }" class="flex h-9 py-2 text-white  hover:bg-primary hover:text-white dark:text-light dark:hover:bg-primary">
  <span aria-hidden="true" :class="{ 'mx-auto': !isSidebarExpanded }" class="h-5 w-5">
    <svg class="h-5 w-5 font-bold" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      {{ $slot }}
    </svg>
  </span>
  <span :class="{ 'hidden': !isSidebarExpanded }" class="ml-2">{{ $name }}</span>
</a>
